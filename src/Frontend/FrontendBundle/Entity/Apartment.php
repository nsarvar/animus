<?php

namespace Frontend\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apartment
 *
 * @ORM\Table(name="apartment")
 * @ORM\Entity
 */
class Apartment
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="move_in_date", type="date", nullable=false)
     */
    private $moveInDate;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=250, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=10, nullable=false)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=250, nullable=false)
     */
    private $town;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=250, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=1024, nullable=false)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return \DateTime
     */
    public function getMoveInDate()
    {
        return $this->moveInDate;
    }

    /**
     * @param \DateTime $moveInDate
     */
    public function setMoveInDate($moveInDate)
    {
        $this->moveInDate = $moveInDate;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param string $town
     */
    public function setTown($town)
    {
        $this->town = $town;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}

