<?php

namespace App\Entity;

use App\Repository\BussinessRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Category;

/**
 * @ORM\Entity(repositoryClass=App\Repository\BussinessRepository::class)
 */
class Bussiness
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\Column(type="string")
    */
    private $title;

    /**
    * @ORM\Column(type="string")
    */
    private $phone;

    /**
    * @ORM\Column(type="string")
    */
    private $address;

    /**
    * @ORM\Column(type="string")
    */
    private $zip_code;

    /**
    * @ORM\Column(type="string")
    */
    private $city;

    /**
    * @ORM\Column(type="string")
    */
    private $state;

    /**
    * @ORM\Column(type="string")
    */
    private $description;

   /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="bussiness")
     * @ORM\JoinTable(name="bussiness_categories")
     */
    private $categories;

    public function __construct() {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * @param mixed $zip_code
     */
    public function setZipcode($zip_code) {
        $this->zip_code = $zip_code;
    }

    /**
     * @return mixed
     */
    public function getZipCode() {
        return $this->zip_code;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city) {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * @param mixed $state
     */
    public function setState($state) {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }
}
