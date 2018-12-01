<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbonnerReponse
 *
 * @ORM\Table(name="abonner_reponse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbonnerReponseRepository")
 */
class AbonnerReponse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var Abonner
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Abonner")
     */
    private $abonner;


    /**
     * @var Reponse
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reponse")
     * @ORM\JoinColumn(name="response_code", referencedColumnName="code")
     */
    private $reponse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return AbonnerReponse
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set abonner
     *
     * @param \AppBundle\Entity\Abonner $abonner
     *
     * @return AbonnerReponse
     */
    public function setAbonner(\AppBundle\Entity\Abonner $abonner = null)
    {
        $this->abonner = $abonner;

        return $this;
    }

    /**
     * Get abonner
     *
     * @return \AppBundle\Entity\Abonner
     */
    public function getAbonner()
    {
        return $this->abonner;
    }

    /**
     * Set reponse
     *
     * @param \AppBundle\Entity\Reponse $reponse
     *
     * @return AbonnerReponse
     */
    public function setReponse(\AppBundle\Entity\Reponse $reponse = null)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return \AppBundle\Entity\Reponse
     */
    public function getReponse()
    {
        return $this->reponse;
    }
}
