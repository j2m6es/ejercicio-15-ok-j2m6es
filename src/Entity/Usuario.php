<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Usuario
{
    /**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $email;

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}