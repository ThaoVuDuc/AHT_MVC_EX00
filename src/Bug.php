<?php
use Doctrine\Common\Collections\ArrayCollection;

//src/Bug.php
/**
 * @Entity(repositoryClass="BugRepository") @Table(name="Bug")
 */

class Bug
{
	/**
	 * @Id @Column(type="integer") GeneratedValue
	 * @var int
	 */
	protected $id;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $description;
	/**
	 * @Column(type="datetime")
	 * @var string
	 */
	protected $status;
	protected $products;
	protected $engineer;
    protected $reporter;

	public function __construct()
	{
		$this->products = new ArrayCollection();
	}

	public function getId() 
	{
		return $this->id;
	}

	public function getDescription() 
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

	public function getStatus() 
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function setEngineer(User $engineer) 
	{
		$engineer->assignedToBug($this);
		$this->engineer = $engineer;
	}

	public function getEngineer() 
	{
		return $this->engineer;
	}

	public function setReporter(User $reporter) 
	{
		 $reporter->addReportedBug($this);
		$this->reporter = $reporter;
	}

	public function getReporter() 
	{
		return $this->reporter;
	}

}