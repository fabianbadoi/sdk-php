<?php
namespace Penneo\SDK;

use Penneo\SDK\Entity;

class SigningRequest extends Entity
{
	protected static $propertyMapping = array(
		'update' => array(
			'email',
			'emailText',
			'successUrl',
			'failUrl'
		)
	);
	protected static $relativeUrl = 'signingrequests';

	protected $email;
	protected $emailText;
	protected $status;
	protected $rejectReason;
	protected $successUrl;
	protected $failUrl;

	public function getLink()
	{
		$data = parent::getAssets($this, 'link');
		return $data[0];
	}

	public function send()
	{
		return parent::callAction($this, 'send');
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	public function getEmailText()
	{
		return $this->emailText;
	}

	public function setEmailText($emailText)
	{
		$this->emailText = $emailText;
	}
	
	public function getStatus()
	{
		switch ($this->status) {
			case 0:
				return 'new';
			case 1:
				return 'pending';
			case 2:
				return 'rejected';
			case 3:
				return 'deleted';
			case 4:
				return 'signed';
			case 5:
				return 'undeliverable';
		}
	
		return 'rejected';
	}
	
	public function getRejectReason()
	{
		return $this->rejectReason;
	}
	
	public function getSuccessUrl()
	{
		return $this->successUrl;
	}

	public function setSuccessUrl($url)
	{
		$this->successUrl = $url;
	}
	
	public function getFailUrl()
	{
		return $this->failUrl;
	}

	public function setFailUrl($url)
	{
		$this->failUrl = $url;
	}
}
