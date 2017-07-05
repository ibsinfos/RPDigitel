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
        $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        
        
        $this->template->set('page', 'domainResults');
        $this->template->set_theme('default_theme');
        $this->template->set('slug', $data['slug']);
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Domain Results')
                ->set_partial('header', 'partials/header')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
         $this->template->build('domain');
    }
    
    
    public function domainsSearchMain($domain_name)
    { 
        $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
       
       $data['domain_name'] = $domain_name;
        //echo '<pre>';print_R($data['domain_name']);die;
        $this->template->set('page', 'domainResults');
        $this->template->set_theme('default_theme');
        $this->template->set('slug', $data['slug']);
        $this->template->set('domain_name', $data['domain_name']);
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Domain Results')
                ->set_partial('header', 'partials/header')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
         $this->template->build('domain-results');
    }
    
    
    public function domainsResults()
    {
        $relativeDomainsData = null;
        $cartContent = [];
        $searchTerm = $this->input->post('search');
       
        $domainTld = $this->input->post('domainTld');
       
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
        
      
        
        
//        
//        $this->template->set('page', 'domainResults');
//        $this->template->set_theme('default_theme');
//          $this->template->set('domainSearchResults', $domainSearchResults);
//        $this->template->set_layout('rpdigitel_frontend');
//         $this->template->build('domain-results-ajax');
        
       // echo '<pre>';print_R($domainSearchResults);die;
        
        ?>

        <ul class="list-unstyled domainResults">
            <?php if(isset($domainSearchResults) && count($domainSearchResults) > 0){
                    foreach($domainSearchResults as $key => $results){
                ?>
	                <li>
	                    <div class="domainType">
                                <span><?php echo strtolower($results); ?></span>
	                    </div>
	                    <div class="priceAction">
	                        <span class="price priceStrike">$29.99</span>
	                        <span class="price">$9.99</span>
	                        <a class="btn btnRed">
	                        	<span class="add">Select</span>
	                        	<span class="remove">Remove</span>
	                        </a>
	                    </div>
	                </li>
                    <?php } } ?> 
	</ul>
<?php
        
        
       
//echo '<pre>';print_R($domainSearchResults);die;
       // $tldPrices = array_map("unserialize", array_unique(array_map("serialize", $this->domainTldPrices)));
        //return view('landing.domains-results', compact('response', 'searchTerm', 'relativeDomainsData', 'cartContent', 'domainResults','tldPrices','domainTld'));
    }
    
    
    
    
    
    public function getRelatedDomains($keyword,$domainTld= null)
    {
        $onlyTldList = !empty($domainTld) ? implode(',',$domainTld):'com,net,org,co,guru,solution,technology,club,system,email,support,computer' ;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://resellertest.enom.com/interface.asp');
        //curl_setopt($ch, CURLOPT_URL, 'https://resellertest.enom.com/interface.asp?command=GetTLDList&uid=sampats_test&pw=Sandy_Sanap_13&responsetype=xml');
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
                 'MaxResults' => 15,
                 'responsetype' => 'xml']
            )
        );
        $response = curl_exec($ch);
        curl_close($ch);
        //echo '<pre>';print_r($response);die;
        return $response;
    }
    

   
    
}
?>