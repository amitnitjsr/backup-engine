<?php namespace spec\Dimsav\Backup\Project;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProjectCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Dimsav\Backup\Project\ProjectCollection');
    }
}
