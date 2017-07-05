<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Domain extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->library('cart');
        $this->load->model("common_model");
    }

    /*
     * Domain search function start here
     */

    public function domains() {
        
        if(isset($_SESSION['paasport_user_id']) && $_SESSION['paasport_user_id'] != ''){
         $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }


        $this->template->set('page', 'domainResults');
        $this->template->set_theme('default_theme');
        if(isset($_SESSION['paasport_user_id']) && $_SESSION['paasport_user_id'] != ''){
            $this->template->set('slug', $data['slug']);
        }
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Domain Results')
                ->set_partial('header', 'partials/header')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('domain');
    }

    public function domainsSearchMain($domain_name) {
        if(isset($_SESSION['paasport_user_id']) && $_SESSION['paasport_user_id'] != ''){
            $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }

        $data['domain_name'] = $domain_name;
        //echo '<pre>';print_R($data['domain_name']);die;
        $this->template->set('page', 'domainResults');
        $this->template->set_theme('default_theme');
        if(isset($_SESSION['paasport_user_id']) && $_SESSION['paasport_user_id'] != ''){
            $this->template->set('slug', $data['slug']);
        }
        $this->template->set('domain_name', $data['domain_name']);
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Domain Results')
                ->set_partial('header', 'partials/header')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('domain-results');
    }

    public function domainsResults() {
        $relativeDomainsData = null;
        $cartContent = [];
        $searchTerm = $this->input->post('search');

        $domainTld = $this->input->post('domainTld');

        //$this->session->set_userdata("domain", $domainTld);
        $contents = $this->cart->contents();
        foreach ($contents as $content) {
            $cartContent[] = $content['name'];
        }
        //echo '<pre>';print_R($cartContent);
        if (!empty($searchTerm)) {
            $relativeDomains = $this->getRelatedDomains($searchTerm, $domainTld);

            $relativeDomainJson = json_encode(simplexml_load_string($relativeDomains, "SimpleXMLElement", LIBXML_NOCDATA));
            $relativeDomainsData = json_decode($relativeDomainJson, true);
        }
        //echo '<pre>';print_r($relativeDomainsData['DomainSuggestions']['Domain']);die;
        if (!empty($relativeDomainsData['DomainSuggestions']['Domain'])) {
            //$domainSearchResults = array_values(array_diff($relativeDomainsData['DomainSuggestions']['Domain'], $cartContent));
            $domainSearchResults = (array_diff($relativeDomainsData['DomainSuggestions']['Domain'], $cartContent));
//            $domainResults = $this->getTLDPrices($domainSearchResults);
        }
        //print_r($domainSearchResults);
//        if(!in_array($searchTerm,$domainSearchResults)){
//            echo "<h3>This domain is already taken.</h3>";
//        }
        
        $arr_available = explode('.',$searchTerm);
      // echo '<pre>'; print_r($domainSearchResults);
        //echo count($arr_available);
        if(count($arr_available) > 1){ 
         //if (in_array($searchTerm, $domainSearchResults)) { 
            $available = 0;
            if(isset($domainSearchResults) && count($domainSearchResults) >0){
                foreach($domainSearchResults as $results){
                   // echo strtolower($string)$results;die;
                    if(strtolower($results) == $searchTerm){
                        $available = 1;
                    }
                }
            }
          
             if ($available){ 
             ?>
             <p> Yes! Your domain is available. Buy it before someone else does. </p>
          <?php }else{ ?>
               Sorry, <?php echo $searchTerm; ?> is taken. 
         <?php }
          
           ?>
       <?php }else{ ?>
            
        <p> Yes! Your domain is available. Buy it before someone else does. </p>
        <?php
        }
        ?>

        <ul class="list-unstyled domainResults">
            <?php
            if (isset($domainSearchResults) && count($domainSearchResults) > 0) {
                $sr = 0;
                foreach ($domainSearchResults as $key => $results) {
                    $sr++;
                    ?>
                    <li>
                        <div class="domainType">
                            <span><?php echo strtolower($results); ?></span>
                        </div>
                        <div class="priceAction">
                            <span class="price priceStrike">$29.99</span>
                            <span class="price">$9.99</span>
                            <a class="btn btnRed" >
                                <span id="<?php echo 'ad' . $sr; ?>" class="add" onclick="add_to_cart('<?php echo strtolower($results) ?>',<?php echo $sr ?>, '99')">Select</span>
                                <span id="<?php echo 'rm' . $sr; ?>" class="remove" onclick="removeProduct('<?php echo strtolower($results) ?>',<?php echo $sr ?>);">Remove</span>
                            </a>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>

        </ul>
        <?php
//echo '<pre>';print_R($domainSearchResults);die;
        // $tldPrices = array_map("unserialize", array_unique(array_map("serialize", $this->domainTldPrices)));
        //return view('landing.domains-results', compact('response', 'searchTerm', 'relativeDomainsData', 'cartContent', 'domainResults','tldPrices','domainTld'));
    }

    public function getRelatedDomains($keyword, $domainTld = null) {
        $onlyTldList = !empty($domainTld) ? implode(',', $domainTld) : 'com,net,org,co,guru,solution,technology,club,system,email,support,computer';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://resellertest.enom.com/interface.asp');
        //curl_setopt($ch, CURLOPT_URL, 'https://resellertest.enom.com/interface.asp?command=GetTLDList&uid=sampats_test&pw=Sandy_Sanap_13&responsetype=xml');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(
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

    public function addToCart() { 
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'options' => array('Size' => '1')
            
//            'id' => '335',
//            'qty' => '1',
//            'price' => '208',
//            'name' => 'googlphone.com',
//            'options' => array('Size' => '1')
        );
        $insert = $this->cart->insert($data);
        if ($insert) {
            $map['status'] = '1';
            $map['msg'] = 'Item added to cart';
            echo json_encode($map);
            exit();
        } else {
            $map['status'] = '0';
            $map['msg'] = 'Unable to add item to cart';
            echo json_encode($map);
            exit();
        }
    }
    public function removeCartItemByName(){
       $product_name =  $this->input->post('product_name');
       $contents = $this->cart->contents();
       //echo '<pre>';print_r($contents);die;
       if($product_name != ''){
           if(isset($contents) && count($contents) > 0){
              foreach($contents as $content){
                  if($content['name'] == $product_name){
                     $rowid =  $content['rowid'];
                      $data = array(
                        'rowid' => $rowid,
                        'qty' => '0',
                    );
                    $remove = $this->cart->update($data);
                  }
              } 
           }
         
       }
    }
    public function removeCartItem()
    {
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty' => '0',
        );
        
        $remove = $this->cart->update($data);
        //$remove = 1;
        if ($remove) {
            //$map['status'] = '1';
            //$map['msg'] = 'Item removed from cart';
            $contents = $this->cart->contents();
                    ?>
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($contents as $content) {
                                $total = $total + $content['subtotal'];
                                ?>
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                            <div class="col-sm-10">
                                                <h4 class="nomargin"><?php echo $content['name'] ?></h4>

                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">$<?php echo $content['price'] ?></td>

                                    <td data-th="Subtotal" class="text-center">$<?php echo $content['subtotal'] ?></td>
                                    <td class="actions" data-th="">
                                        <button onclick="removeItem('<?php echo $content['rowid'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>                                
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="visible-xs">
                                <td class="text-center"><strong>Total $<?php echo $total; ?></strong></td>
                            </tr>
                            <tr>
                                <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                <td colspan="2" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total $<?php echo $total; ?></strong></td>
                                <td><a href="<?php echo base_url() ?>check_out" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                            </tr>
                        </tfoot>
                    </table>

                <?php
//            echo json_encode($map);
//            exit();
        } else {
            $map['status'] = '0';
            $map['msg'] = 'Unable to remove item';
            echo json_encode($map);
            exit();
        }
    }
    
    public function cart(){
        if(isset($_SESSION['paasport_user_id']) && $_SESSION['paasport_user_id'] != ''){
            $data['slug'] = $this->common_model->getPaasportSlug($_SESSION['paasport_user_id']);
        }
        $contents = $this->cart->contents();
        //echo '<pre>';print_R($data['domain_name']);die;
        $this->template->set('page', 'domainResults');
        $this->template->set_theme('default_theme');
        if(isset($_SESSION['paasport_user_id']) && $_SESSION['paasport_user_id'] != ''){
            $this->template->set('slug', $data['slug']);
        }
        
        $this->template->set('contents', $contents);
        $this->template->set_layout('rpdigitel_frontend')
                ->title('Domain Results')
                ->set_partial('header', 'partials/header')
                ->set_partial('header', 'partials/header')
                ->set_partial('footer', 'partials/footer');
        $this->template->build('domain_cart');
    }

}
?>