<?php

namespace App\Entity;

use App\Repository\BussinessCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BussinessCategoriesRepository::class)
 */
class BussinessCategories
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $bussiness_id;
    
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $category_id;

    /**
     * @return mixed
     */
    public function getBussinessId() {
        return $this->bussiness_id;
    }

    /**
     * @param mixed $bussiness_id
     */
    public function setBussinessId($bussiness_id) {
        $this->bussiness_id = $bussiness_id;
    }

    /**
     * @return mixed
     */
    public function getCategoryId() {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }


}
