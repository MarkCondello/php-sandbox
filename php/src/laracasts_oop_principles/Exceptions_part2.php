<?php

class MaximumMembersReached extends Exception
{
    protected $message = "Maximum team size reached.";
}

class Member
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Team
{

    private $members = [];

    public function add(Member $member)
    {
        $this->teamSize();
        $this->members[] = $member;
    }

    public function teamSize()
    {
        if (count($this->members) === 3) {
            throw new MaximumMembersReached;
        }
    }

    public function getTeam()
    {
        return $this->members;
    }
}

class TeamMemberController
{
    public function store()
    {
        $team = new Team;

        try {
            $team->add(new Member('Jane Doe'));
            $team->add(new Member('Joe Bloggs'));
            $team->add(new Member('Mark Arelius'));
            $team->add(new Member('Leo Nidus'));
            var_dump($team->getTeam());

        } catch (MaximumMembersReached $e) {
            var_dump($e->getMessage());
        }
    }
}


(new TeamMemberController)->store();

