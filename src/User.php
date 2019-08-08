<?php
use Doctrine\Common\Collections\ArrayCollection;

//src/User.php
/**
 * @Entity $Table(name="users")
 */

class User
{
	/**
	 * @Id GeneratedValue @Column(type="integer")
	 * @var int
	 */
	protected $id;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $name;
	protected $reportedBugs;
    protected $assignedBugs;
	protected $reportedBugs;
    protected $assignedBugs;

	function __construct()
	{
		$this->reportedBugs = new ArrayCollection();
		$this->assignedBugs = new ArrayCollection();
	}
	public function getId() 
	{
		return $this->id;
	}

	public function setName($name) 
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function addReportedBug(Bug $bug)
    {
        $this->reportedBugs[] = $bug;
    }

    public function assignedToBug(Bug $bug)
    {
        $this->assignedBugs[] = $bug;
    }
}