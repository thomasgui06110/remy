{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{capture name=path}{l s='Contact'}{/capture}
<h1 class="page-heading bottom-indent">
    {l s='Customer service'} - {if isset($customerThread) && $customerThread}{l s='Your reply'}{else}{l s='Contact us'}{/if}
</h1>
<div class="wht_bg">
    <div class="wrap_indent">
    {if $theme_settings.show_map == 1}
        <div id="map-canvas2" style="height:250px; margin-bottom:20px"></div>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script>
        function initialize2() {
          var myLatlng2 = new google.maps.LatLng({$theme_settings.location_lat},{$theme_settings.location_lng});
          var mapOptions2 = {
            zoom: 9,
            center: myLatlng2,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          var map2 = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions2);
          var marker2 = new google.maps.Marker({
              position: myLatlng2,
              map: map2
          });
        }
        google.maps.event.addDomListener(window, 'load', initialize2);
        </script>
    {/if}        
{if isset($confirmation)}
	<p class="alert alert-success">{l s='Your message has been successfully sent to our team.'}</p>
	<ul class="footer_links clearfix">
		<li>
            <a class="btn btn-default button button-small" href="{$base_dir}">
                <span>
                    <i class="icon-chevron-left"></i>{l s='Home'}
                </span>
            </a>
        </li>
	</ul>
{elseif isset($alreadySent)}
	<p class="alert alert-warning">{l s='Your message has already been sent.'}</p>
	<ul class="footer_links clearfix">
		<li>
            <a class="btn btn-default button button-small" href="{$base_dir}">
                <span>
                    <i class="icon-chevron-left"></i>{l s='Home'}
                </span>
            </a>
        </li>
	</ul>
{else}
	{include file="$tpl_dir./errors.tpl"}
	<form action="{$request_uri|escape:'html':'UTF-8'}" method="post" class="contact-form-box" enctype="multipart/form-data">
		<fieldset>
        <h3 class="page-subheading">{l s='Send a message'}</h3>
        <div class="clearfix">
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label for="id_contact">{l s='Subject Heading'}</label>
                {if isset($customerThread.id_contact)}
                        {foreach from=$contacts item=contact}
                            {if $contact.id_contact == $customerThread.id_contact}
                                <input type="text" class="form-control" id="contact_name" name="contact_name" value="{$contact.name|escape:'html':'UTF-8'}" readonly="readonly" />
                                <input type="hidden" name="id_contact" value="{$contact.id_contact}" />
                            {/if}
                        {/foreach}
                </div> <!-- .selector1 -->
                {else}
                    <select id="id_contact" class="form-control" name="id_contact" onchange="showElemFromSelect('id_contact', 'desc_contact')">
                        <option value="0">{l s='-- Choose --'}</option>
                        {foreach from=$contacts item=contact}
                            <option value="{$contact.id_contact|intval}" {if isset($smarty.request.id_contact) && $smarty.request.id_contact == $contact.id_contact}selected="selected"{/if}>{$contact.name|escape:'html':'UTF-8'}</option>
                        {/foreach}
                    </select>
                </div> <!-- .col-xs-12 .col-md-3 -->
                    <div id="desc_contact0" class="desc_contact">&nbsp;</div>
                    {foreach from=$contacts item=contact}
                        <div id="desc_contact{$contact.id_contact|intval}" class="desc_contact contact-title" style="display:none;">
                            <i class="icon-comment-alt"></i>{$contact.description|escape:'html':'UTF-8'}
                        </div>
                    {/foreach}
                {/if}
                <div class="form-group">
                    <label for="email">{l s='Email address'}</label>
                    {if isset($customerThread.email)}
                        <input class="form-control grey" type="text" id="email" name="from" value="{$customerThread.email|escape:'html':'UTF-8'}" readonly="readonly" />
                    {else}
                        <input class="form-control grey validate" type="text" id="email" name="from" data-validate="isEmail" value="{$email|escape:'html':'UTF-8'}" />
                    {/if}
                </div>
                {if !$PS_CATALOG_MODE}
                    {if (!isset($customerThread.id_order) || $customerThread.id_order > 0)}
                        <div class="form-group">
                            <label>{l s='Order reference'}</label>
                            {if !isset($customerThread.id_order) && isset($isLogged) && $isLogged}
                                <select name="id_order" class="form-control">
                                    <option value="0">{l s='-- Choose --'}</option>
                                    {foreach from=$orderList item=order}
                                        <option value="{$order.value|intval}" {if $order.selected|intval}selected="selected"{/if}>{$order.label|escape:'html':'UTF-8'}</option>
                                    {/foreach}
                                </select>
                            {elseif !isset($customerThread.id_order) && empty($isLogged)}
                                <input class="form-control grey" type="text" name="id_order" id="id_order" value="{if isset($customerThread.id_order) && $customerThread.id_order|intval > 0}{$customerThread.id_order|intval}{else}{if isset($smarty.post.id_order) && !empty($smarty.post.id_order)}{$smarty.post.id_order|intval}{/if}{/if}" />
                            {elseif $customerThread.id_order|intval > 0}
                                <input class="form-control grey" type="text" name="id_order" id="id_order" value="{$customerThread.id_order|intval}" readonly="readonly" />
                            {/if}
                        </div>
                    {/if}
                    {if isset($isLogged) && $isLogged}
                        <div class="form-group">
                            <label>{l s='Product'}</label>
                            {if !isset($customerThread.id_product)}
                                {foreach from=$orderedProductList key=id_order item=products name=products}
                                    <select name="id_product" id="{$id_order}_order_products" class="product_select form-control" style="{if !$smarty.foreach.products.first} display:none; {/if}" {if !$smarty.foreach.products.first}disabled="disabled" {/if}>
                                        <option value="0">{l s='-- Choose --'}</option>
                                        {foreach from=$products item=product}
                                            <option value="{$product.value|intval}">{$product.label|escape:'html':'UTF-8'}</option>
                                        {/foreach}
                                    </select>
                                {/foreach}
                            {elseif $customerThread.id_product > 0}
                                <input class="form-control grey" type="text" name="id_product" id="id_product" value="{$customerThread.id_product|intval}" readonly="readonly" />
                            {/if}
                        </div>
                    {/if}
                {/if}
                {if $fileupload == 1}
                    <p class="form-group">
                        <label for="fileUpload">{l s='Attach File'}</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                        <input type="file" name="fileUpload" id="fileUpload" class="form-control" />
                    </p>
                {/if}
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label for="message">{l s='Message'}</label>
                    <textarea class="form-control" id="message" name="message">{if isset($message)}{$message|escape:'html':'UTF-8'|stripslashes}{/if}</textarea>
                </div>
            </div>
        </div>
        {if $captcha}
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <div class="g-recaptcha" data-sitekey="6LecK4gUAAAAAEqS8XVvWcDHnUWH_Zv-8igo430R"></div>
        {/if}
        <div class="submit">
            <input type="submit" name="submitMessage" id="submitMessage" value="{l s='Send'}" class="button_large" />
		</div>
	</fieldset>
</form>
{/if}
</div>
</div>