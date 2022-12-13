<?php
	class Api extends CI_Controller
	{
        function v1($param1,$param2,$param3=NULL)
        {
            
            //return values
            $return=array();

            //Get API Token 
            $isApiAllowed=$this->Administrator_Model->apikeyvalidation($param2);
            if($isApiAllowed==false)
            {
                $return['error']=true;
                $return['error_message']='Invalid API token';

            }
            else
            {
                //all campaigns $param=1
                if($param1=='campaigns')
                {
                    $allActivecampaigns=$this->Administrator_Model->campaign_listing_data();
                    $return['error']=false;
                    $return['error_message']='';
                   
                    $campaigndata=array();

                    if($allActivecampaigns)
                    {
                        $i=0;

                        foreach($allActivecampaigns as $camp)
                        {
                            if($camp['campaign_status']=='Approved') {

                                if(strtotime($camp['campaign_start_date'])>=strtotime(date('Y-m-d')) && strtotime(date('Y-m-d'))<=strtotime($camp['campaign_end_date']))
                                {
                                    $campaigndata[$i]['campaignstartDate']=$camp['campaign_start_date'];
                                    $campaigndata[$i]['campaignendDate']=$camp['campaign_end_date'];
                                    $campaigndata[$i]['campaignTitle']=$camp['campaign_title'];
                                    $campaigndata[$i]['campaignMediatype']=$camp['campaign_media_type'];
                                    $campaigndata[$i]['adPosition']=$camp['ad_type'];
                                    $campaigndata[$i++]['campaign']=base_url().'api/v1/campaign/'.$param2.'/'.($camp['id']);
                                    $campaigndata[$i++]['adv']=base_url().'api/v1/adv/'.$param2.'/'.($camp['id']);

                                }
                            }
                        }
                    }
                    
                        $return['error']=false;
                        $return['error_message']='';
                        $return['data']=$campaigndata;

                    
                }


                //individual campaign
                if($param1=='campaign')
                {
                    $campaigndata=array();

                    if($param3!=NULL)
                    {
                        if(is_numeric(($param3)))
                        {
                            $campaignDetails=$this->Administrator_Model->campaign_listing_data(($param3));
                            $i=0;

                                    $campaigndata[$i]['campaignstartDate']=$campaignDetails['campaign_start_date'];
                                    $campaigndata[$i]['campaignendDate']=$campaignDetails['campaign_end_date'];
                                    $campaigndata[$i]['campaignTitle']=$campaignDetails['campaign_title'];
                                    $campaigndata[$i]['campaignMediatype']=$campaignDetails['campaign_media_type'];
                                    $campaigndata[$i]['adPosition']=$campaignDetails['ad_type'];                                   
                                    $campaigndata[$i++]['adv']=base_url().'api/v1/adv/'.$param2.'/'.$param3;
                        }
                        else
                        {
                            $return['error']=true;
                            $return['error_message']='Invalid campaign lookup';
                            
                        }
                    }
                    else
                    {
                        $return['error']=true;
                        $return['error_message']='Invalid campaign lookup';
                      
                    }

                    $return['error']=false;
                    $return['error_message']='';
                    $return['data']=$campaigndata;

                }


                //individual campaign adv
                if($param1=='adv')
                {
                    $campaigndata=array();

                    if($param3!=NULL)
                    {
                        if(is_numeric(($param3)))
                        {
                            $campaignDetails=$this->Administrator_Model->campaign_listing_data(($param3));
                            $i=0;

                                    $campaigndata[$i]['campaignstartDate']=$campaignDetails['campaign_start_date'];
                                    $campaigndata[$i]['campaignendDate']=$campaignDetails['campaign_end_date'];
                                    $campaigndata[$i]['campaignTitle']=$campaignDetails['campaign_title'];
                                    $campaigndata[$i]['campaignMediatype']=$campaignDetails['campaign_media_type'];
                                    $campaigndata[$i]['adPosition']=$campaignDetails['ad_type'];                                   
                                    $campaigndata[$i++]['adv']=base_url().'api/v1/adv/'.$param2.'/'.$param3;
                        }
                        else
                        {
                            $return['error']=true;
                            $return['error_message']='Invalid campaign lookup';
                            
                        }
                    }
                    else
                    {
                        $return['error']=true;
                        $return['error_message']='Invalid campaign lookup';
                      
                    }

                    $return['error']=false;
                    $return['error_message']='';
                    $return['data']=$campaigndata;

                }


            }

            echo json_encode($return);

        }
    }