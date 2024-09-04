<?php

namespace JustDevs\BIGRegister\Client;

use SoapClient;
use SoapFault;

class PublicV4 extends SoapClient
{
  /**
   * @var array $classmap The defined classes
   */
  private static array $classmap = [
    'ListHcpApproxRequest' => ListHcpApproxRequest::class,
    'ListHcpApproxResponse4' => ListHcpApproxResponse4::class,
    'ArrayOfListHcpApprox4' => ArrayOfListHcpApprox4::class,
    'ListHcpApprox4' => ListHcpApprox4::class,
    'Address' => Address::class,
    'ArrayOfArticleRegistrationExtApp' => ArrayOfArticleRegistrationExtApp::class,
    'ArticleRegistrationExtApp' => ArticleRegistrationExtApp::class,
    'ArrayOfSpecialismExtApp1' => ArrayOfSpecialismExtApp1::class,
    'SpecialismExtApp1' => SpecialismExtApp1::class,
    'ArrayOfMentionExtApp' => ArrayOfMentionExtApp::class,
    'MentionExtApp' => MentionExtApp::class,
    'ArrayOfJudgmentProvisionExtApp' => ArrayOfJudgmentProvisionExtApp::class,
    'JudgmentProvisionExtApp' => JudgmentProvisionExtApp::class,
    'ArrayOfLimitationExtApp' => ArrayOfLimitationExtApp::class,
    'LimitationExtApp' => LimitationExtApp::class,
    'GetRibizReferenceData' => GetRibizReferenceData::class,
    'GetRibizReferenceDataRequest' => GetRibizReferenceDataRequest::class,
    'GetRibizReferenceDataResponse' => GetRibizReferenceDataResponse::class,
    'ArrayOfProfessionalGroup' => ArrayOfProfessionalGroup::class,
    'ProfessionalGroup' => ProfessionalGroup::class,
    'ArrayOfTypeOfSpecialism' => ArrayOfTypeOfSpecialism::class,
    'TypeOfSpecialism' => TypeOfSpecialism::class,
  ];

  /**
   * @param array $options An array of config values
   * @param string|null $wsdl The WSDL file to use
   */
  public function __construct(array $options = [], string $wsdl = null)
  {
    foreach (self::$classmap as $key => $value) {
      if (!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    $options = array_merge(['features' => SOAP_SINGLE_ELEMENT_ARRAYS], $options);
    $wsdl = $wsdl ?? 'https://api.bigregister.nl/zksrv/soap/4?wsdl';
    parent::__construct($wsdl, $options);
  }

  /**
   * Search for health care professionals based on approx match
   *
   * @param ListHcpApproxRequest $listHcpApproxRequest
   * @return ListHcpApproxResponse4|null
   */
  public function ListHcpApprox4(ListHcpApproxRequest $listHcpApproxRequest): ?ListHcpApproxResponse4
  {
    try {
      return $this->__soapCall('ListHcpApprox4', [$listHcpApproxRequest]);
    } catch (SoapFault $e) {
      error_log('SOAP Fault: (faultcode: ' . $e->faultcode . ', faultstring: ' . $e->getMessage() . ')');
      return null;
    }
  }

  /**
   * Returns the RIBIZ reference data
   *
   * @param GetRibizReferenceData $parameters
   * @return GetRibizReferenceDataResponse|null
   */
  public function GetRibizReferenceData(GetRibizReferenceData $parameters): ?GetRibizReferenceDataResponse
  {
    try {
      return $this->__soapCall('GetRibizReferenceData', [$parameters]);
    } catch (SoapFault $e) {
      error_log('SOAP Fault: (faultcode: ' . $e->faultcode . ', faultstring: ' . $e->getMessage() . ')');
      return null;
    }
  }
}
