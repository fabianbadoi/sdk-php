<?php
namespace Penneo\SDK;

class Signer extends Entity
{
	protected static $propertyMapping = array(
		'create' => array('name','socialSecurityNumberPlain','onBehalfOf'),
		'update' => array('name','socialSecurityNumberPlain','onBehalfOf')
	);
	protected static $relativeUrl = 'signers';

	protected $name;
	protected $socialSecurityNumberPlain;
	protected $onBehalfOf;
	
	protected $caseFile;

	public function __construct(CaseFile $caseFile)
	{
		$this->caseFile = $caseFile;
	}

	public function getParent()
	{
		return $this->caseFile;
	}

	public function getSigningRequest()
	{
		$requests = parent::getLinkedEntities($this, 'Penneo\SDK\SigningRequest');
		return $requests[0];
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getSocialSecurityNumber()
	{
		return $this->socialSecurityNumberPlain;
	}

	public function setSocialSecurityNumber($ssn)
	{
		$this->socialSecurityNumberPlain = $ssn;
	}
	
	public function getOnBehalfOf()
	{
		return $this->onBehalfOf;
	}

	public function setOnBehalfOf($onBehalfOf)
	{
		$this->onBehalfOf = $onBehalfOf;
	}
}
