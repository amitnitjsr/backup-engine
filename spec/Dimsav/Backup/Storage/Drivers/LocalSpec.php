<?php namespace spec\Dimsav\Backup\Storage\Drivers;

use Dimsav\Backup\Storage\Exceptions\InvalidStorageException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LocalSpec extends ObjectBehavior
{
    private $destinationDir;

    function let()
    {
        $this->destinationDir = __DIR__.'/../../../../../temp';
    }


    // Validation

    function it_throws_exception_if_name_is_not_set()
    {
        $exception = new InvalidStorageException('The name for the local storage is not set.');
        $this->beConstructedWith(array());
        $this->shouldThrow($exception)->duringValidate();
    }

    function it_throws_exception_if_destination_is_not_set()
    {
        $exception = new InvalidStorageException("The local storage 'storage_name' has no destination set.");
        $this->beConstructedWith(array('name' => 'storage_name'));
        $this->shouldThrow($exception)->duringValidate();
    }

    function it_throws_excepetion_if_storing_file_does_not_exist()
    {
        $file = __DIR__.'/test.php';
        $exception = new \InvalidArgumentException("Local storage 'name' could not find the file '$file'.");
        $this->beConstructedWith(array('name'=>'name', 'destination' => $this->destinationDir));
        $this->shouldThrow($exception)->duringStore($file);
    }


    // Storage

    function it_stores_the_selected_file_by_copying_the_file_to_the_destination()
    {
        $this->beConstructedWith(array('name'=>'name', 'destination' => $this->destinationDir));
        $this->store(__FILE__, 'projectName')->shouldCreateFile($this->destinationDir.'/projectName/'. basename(__FILE__));
    }

    function letGo()
    {
        exec("rm -rf $this->destinationDir");
    }

    function getMatchers()
    {
        return array(
            'createFile' => function($return, $file) {
                return file_exists($file);
            }
        );
    }

}