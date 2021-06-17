<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Cliente
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
     * @return Cliente
     */
    public function seEmail($email)
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