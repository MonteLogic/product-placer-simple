<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/dchavours/
 * @since      1.0.0
 *
 * @package    Product_Placer_Simple
 * @subpackage Product_Placer_Simple/public/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<div class="simple-contact-form">
            
            <h1>Send us an email</h1>
            
            <p>Please fill the below form</p>
            
            <form id="simple-contact-form__form">
                
                <div class="form-group mb-2"> 
                    <input name="name" type="text" placeholder="Name" class="form-control">
                </div>
                            
                <div class="form-group mb-2"> 
                    <input name="email" type="email" placeholder="Name" class="form-control">
                </div>
                            
                <div class="form-group mb-2"> 
                    <input name="phone" type="tel" placeholder="Name" class="form-control">
                </div>

                <div class="form-group mb-2">                     
                <textarea name="message" placeholder="Type your message" class="form-control"></textarea>
                </div>

                <div class="form-group mb-2">                                             
                <button class="btn btn-success btn-block w-100">Send Message</button>
                </div>
                   
            </form>

        </div>