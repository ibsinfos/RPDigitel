<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Domain extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model("common_model");
    }

    /*
     * Domain search function start here
     */

    public function domains()
    { 
        
        if (count($_POST) > 0) {
           
        }
        $this->template->set('page', 'domainResults');
        $this->template->set_theme('default_theme');
        $this->template->set_layout('frontend_silo')
                ->title('Domain Results');
//                ->set_partial('header', 'partials/header')
//                ->set_partial('footer', 'partials/footer');
        $this->template->build('domain-results');
    }
    
    
    public function domainsResults()
    {
        $relativeDomainsData = null;
        $cartContent = [];
        $searchTerm = $this->input->post('search');

        //$domainTld = $request->input('domainTld');
        $domainTld = '';
       // $request->session()->set('domain', $searchTerm);
        $this->session->set_userdata("domain", $domainTld);
        
//        foreach (Cart::content() as $content) {
//            $cartContent[] = $content->name;
//        }
        if (!empty($searchTerm)) {
            $relativeDomains = $this->getRelatedDomains($searchTerm,$domainTld);

            $relativeDomainJson = json_encode(simplexml_load_string($relativeDomains, "SimpleXMLElement", LIBXML_NOCDATA));
            $relativeDomainsData = json_decode($relativeDomainJson, true);
        }
        
        if(!empty($relativeDomainsData['DomainSuggestions']['Domain'])) {
            $domainSearchResults = array_values(array_diff($relativeDomainsData['DomainSuggestions']['Domain'], $cartContent));

            //$domainResults = $this->getTLDPrices($domainSearchResults);
        }
        echo '<pre>';print_R($domainSearchResults[0]);
//echo '<pre>';print_R($domainSearchResults);die;
       // $tldPrices = array_map("unserialize", array_unique(array_map("serialize", $this->domainTldPrices)));
        return view('landing.domains-results', compact('response', 'searchTerm', 'relativeDomainsData', 'cartContent', 'domainResults','tldPrices','domainTld'));
    }
    
    
    
    
    
    public function getRelatedDomains($keyword,$domainTld= null)
    {
        $onlyTldList = !empty($domainTld) ? implode(',',$domainTld):'com,net,org' ;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://resellertest.enom.com/interface.asp');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(
                ['command' => 'GETNAMESUGGESTIONS',
                 'UID' => 'sampats_test',
                 'PW' => 'Sandy_Sanap_13',
                 'SearchTerm' => $keyword,
                 'TldList' => $onlyTldList,
                 'OnlyTldList' => $onlyTldList,
                 'MaxResults' => 5,
                 'responsetype' => 'xml']
            )
        );
        $response = curl_exec($ch);
        curl_close($ch);
        echo '<pre>';print_r($response);die;
        return $response;
    }
    

   
    
}
