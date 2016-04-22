<?php

namespace RiotBundle\Entity;


class ChampionInfo
{
    //Champion ID. For static information correlating to champion IDs, please refer to the LoL Static Data API.
    private $allytips;
    private $enemytips;
    private $id;
    private $image;
    private $info;
    private $name;
    private $partype;
    private $passive;
    private $recommended;
    private $skins;
    private $spells;
    private $tags;
    private $title;

    /**
     * @return mixed
     */
    public function getAllytips()
    {
        return $this->allytips;
    }

    /**
     * @param mixed $allytips
     */
    public function setAllytips($allytips)
    {
        $this->allytips = $allytips;
    }

    /**
     * @return mixed
     */
    public function getEnemytips()
    {
        return $this->enemytips;
    }

    /**
     * @param mixed $enemytips
     */
    public function setEnemytips($enemytips)
    {
        $this->enemytips = $enemytips;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPartype()
    {
        return $this->partype;
    }

    /**
     * @param mixed $partype
     */
    public function setPartype($partype)
    {
        $this->partype = $partype;
    }

    /**
     * @return mixed
     */
    public function getPassive()
    {
        return $this->passive;
    }

    /**
     * @param mixed $passive
     */
    public function setPassive($passive)
    {
        $this->passive = $passive;
    }

    /**
     * @return mixed
     */
    public function getRecommended()
    {
        return $this->recommended;
    }

    /**
     * @param mixed $recommended
     */
    public function setRecommended($recommended)
    {
        $this->recommended = $recommended;
    }

    /**
     * @return mixed
     */
    public function getSkins()
    {
        return $this->skins;
    }

    /**
     * @param mixed $skins
     */
    public function setSkins($skins)
    {
        $this->skins = $skins;
    }

    /**
     * @return mixed
     */
    public function getSpells()
    {
        return $this->spells;
    }

    /**
     * @param mixed $spells
     */
    public function setSpells($spells)
    {
        $this->spells = $spells;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function toArray()
    {
        $champ = array(
            'allytips' => $this->allytips,
            'enemytips' => $this->enemytips,
            'id' => $this->id,
            'image' => $this->image,
            'info' => $this->info,
            'name' => $this->name,
            'partype' => $this->partype,
            'passive' => $this->passive,
            'recommended' => $this->recommended,
            'skins' => $this->skins,
            'spells' => $this->spells,
            'tags' => $this->tags,
            'title' => $this->title
        );
        return $champ;
    }
}