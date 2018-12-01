<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReponseRepository")
 */
class Reponse
{

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var Questionnaire
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Questionnaire")
     *
     * @ORM\JoinColumn(name="question_code", referencedColumnName="code")
     */
    private $question;


    /**
     * Set value
     *
     * @param string $value
     *
     * @return Reponse
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Reponse
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set question
     *
     * @param \AppBundle\Entity\Questionnaire $question
     *
     * @return Reponse
     */
    public function setQuestion(\AppBundle\Entity\Questionnaire $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\Questionnaire
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
