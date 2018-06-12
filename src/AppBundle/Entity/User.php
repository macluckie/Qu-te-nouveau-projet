<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User  extends BaseUser
{





    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=32)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=32)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=32)
     */
    protected $phoneNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date")
     */
    protected $birthDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime", nullable = true)
     */
    protected $creationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="smallint", nullable = true)
     */
    protected $note;

    /**
     * @var bool
     *
     * @ORM\Column(name="isCertifiedPilot", type="boolean")
     */
    protected $isCertifiedPilot;

    /**
     * @ORM\OneToMany(targetEntity="Review", mappedBy="reviewAuthor")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $reviewAuthors;


    /**
      * @ORM\OneToMany(targetEntity="Flight", mappedBy="pilot")
      */
    protected $pilots;



       /**
         * @ORM\OneToMany(targetEntity="Reservation", mappedBy="passenger")
         */
    protected $passengers;






    public function __toString()
    {
        return $this->firstName.' '.$this->lastName;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**FormType RegistrationType a été créé.
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return User
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return User
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set isCertifiedPilot
     *
     * @param boolean $isCertifiedPilot
     *
     * @return User
     */
    public function setIsCertifiedPilot($isCertifiedPilot)
    {
        $this->isCertifiedPilot = $isCertifiedPilot;

        return $this;
    }

    /**
     * Get isCertifiedPilot
     *
     * @return bool
     */
    public function getIsCertifiedPilot()
    {
        return $this->isCertifiedPilot;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reviewAuthors = new \Doctrine\Common\Collections\ArrayCollection();
        parent::__construct();

    }

    /**
     * Add reviewAuthor
     *
     * @param \AppBundle\Entity\Review $reviewAuthor
     *
     * @return User
     */
    public function addReviewAuthor(\AppBundle\Entity\Review $reviewAuthor)
    {
        $this->reviewAuthors[] = $reviewAuthor;

        return $this;
    }

    /**
     * Remove reviewAuthor
     *
     * @param \AppBundle\Entity\Review $reviewAuthor
     */
    public function removeReviewAuthor(\AppBundle\Entity\Review $reviewAuthor)
    {
        $this->reviewAuthors->removeElement($reviewAuthor);
    }

    /**
     * Get reviewAuthors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviewAuthors()
    {
        return $this->reviewAuthors;
    }

    /**
     * Add pilot
     *
     * @param \AppBundle\Entity\Flight $pilot
     *
     * @return User
     */
    public function addPilot(\AppBundle\Entity\Flight $pilot)
    {
        $this->pilots[] = $pilot;

        return $this;
    }

    /**
     * Remove pilot
     *
     * @param \AppBundle\Entity\Flight $pilot
     */
    public function removePilot(\AppBundle\Entity\Flight $pilot)
    {
        $this->pilots->removeElement($pilot);
    }

    /**
     * Get pilots
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPilots()
    {
        return $this->pilots;
    }

    /**
     * Add passenger
     *
     * @param \AppBundle\Entity\Reservation $passenger
     *
     * @return User
     */
    public function addPassenger(\AppBundle\Entity\Reservation $passenger)
    {
        $this->passengers[] = $passenger;

        return $this;
    }

    /**
     * Remove passenger
     *
     * @param \AppBundle\Entity\Reservation $passenger
     */
    public function removePassenger(\AppBundle\Entity\Reservation $passenger)
    {
        $this->passengers->removeElement($passenger);
    }

    /**
     * Get passengers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPassengers()
    {
        return $this->passengers;
    }
}
