<?phpclass TABLES{    public static $ADMIN_USER = 'tbl_users';    public static $BUSINESS_STRAT = 'tbl_business_strategies';    public static $MST_GLOBAL_SETTING = 'tbl_mst_global_settings';    public static $TRANS_GLOBAL_SETTING = 'tbl_trans_global_settings';    public static $EMAIL_TEMPLATE = 'tbl_mst_email_templates';    public static $COUNTRIES = 'tbl_countries';    public static $STATES = 'tbl_states';    public static $CITIES = 'tbl_cities';    public static $OPTIN_LIST = 'tbl_optin_lists';    public static $SMS_TEMPLATE = 'tbl_sms_template';  	//Added by ranjit on 11 May17	// public static $EMAIL_OPTIN_LIST = 'tbl_email_optin_lists';	public static $CRON_TEXTMSG= 'tbl_cronjob_textmsg';	//Added by Ranjit on 15 May 2017 [discussed with Atul sir]    public static $CRON_EMAIL= 'tbl_cronjob_email';    public static $MST_PLANS= 'tbl_pricing_plans';    public static $MST_AUTO_RESPONDER= 'tbl_mst_autorepsonders';    public static $TRANS_AUTO_RESPONDER= 'tbl_trans_autorepsonders';    public static $CLIENT_CONTACTS= 'tbl_clients_contacts';	//Added by Ranjit on 15 May 2017 [discussed with Atul sir]	// public static $CLIENT_EMAIL_IDS= 'tbl_clients_email_ids';    public static $CONTACT_MAPPING= 'tbl_list_contact_mapping';		//Added by Ranjit on 15 May 2017 [discussed with Atul sir]    // public static $EMAIL_MAPPING= 'tbl_email_list_mapping';    public static $VCARD_TABS= 'tbl_vcard_tabs';    public static $VCARD_CUSTOM_TABS= 'tbl_vcard_custom_tabs';    public static $APPOINTMENTS= 'tbl_appointments';    public static $CONTACTED_USERS= 'tbl_contacted_users';        //Added by Ranjit on 09 may 2017     public static $EXPERIENCE_DETAILS= 'tbl_experience_details';        public static $EDUCATION_DETAILS= 'tbl_education_details';        public static $SKILLS_AND_EXPERTISE= 'tbl_skills_and_expertise';		// Added by vaishali on 10 may 2017    public static $PRICE_PLAN= 'tbl_price_plan';	    public static $LIST_DETAILS= 'tbl_list';	    public static $LINK_DETAILS= 'tbl_link';	    public static $VIDEO_DETAILS= 'tbl_video';	    public static $PORTFOLIO_DETAILS= 'tbl_portfolio';		public static $VCARD_BASIC_DETAILS= 'tbl_vcard_basic';	    public static $VCARD_COMPANY_DETAILS= 'tbl_company_details';        }