/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * custom coding
 */
var dtech_app = {
    /**
     * to update element on ajax all
     * @param {type} ajax_url
     * @param {type} update_element_id
     * @param {type} resource_elem_id
     * @param {type} action of system
     * @returns {undefined}
     */
    updateElementAjax: function(ajax_url, update_element_id, resource_elem_id, action) {

        /***
         * only the case in which redirection is needed
         */
        if (action == "contactUs" || action=="ideas" || action == 'jobs') {
            window.location = ajax_url;
            return true;
        }
        jQuery("body").addClass("loading");
        if (jQuery("#" + resource_elem_id).val() != "") {
            jQuery.ajax({
                type: "POST",
                url: ajax_url,
                async: false,
                data:
                        {
                            resource_elem_id: !(resource_elem_id != "") ? jQuery("#" + resource_elem_id).val() : "",
                            ajax: 1,
                        }
            }).done(function(response) {

                setTimeout(function() {
                    jQuery("body").removeClass("loading");
                    jQuery("#" + update_element_id).html(response);
                }, 1200)

            });
        }

    },
    /**
     * to update element on ajax all
     * @param {type} ajax_url
     * @param {type} update_element_id
     * @param {type} resource_elem_id
     * @param {type} action of system
     * @returns {undefined}
     */
    updateElementAjaxJson: function(ajax_url, resource_elem_id, action) {

        /***
         * only the case in which redirection is needed
         */
        if (action == "contactUs") {
            window.location = ajax_url;
            return true;
        }
        jQuery("body").addClass("loading");
        if (jQuery("#" + resource_elem_id).val() != "") {
            jQuery.ajax({
                type: "POST",
                url: ajax_url,
                dataType: "json",
                async: false,
                data:
                        {
                            resource_elem_id: !(resource_elem_id != "") ? jQuery("#" + resource_elem_id).val() : "",
                            ajax: 1,
                        }
            }).done(function(response) {

                setTimeout(function() {
                    jQuery("body").removeClass("loading");

                    jQuery("#banner").html(response['slider']);
                    jQuery(".book_content").html(response['product_content']);
                }, 1200)

            });
        }

    },
    /**
     * to update element on ajax all
     * @param {type} ajax_url
     * @param {type} update_element_id
     * @param {type} resource_elem_id
     * @param {type} action of system
     * @returns {undefined}
     */
    updateElementAjaxJsonPagination: function(ajax_url) {

        /***
         * only the case in which redirection is needed
         */

        jQuery("body").addClass("loading");

        jQuery.ajax({
            type: "POST",
            url: ajax_url,
            dataType: "json",
            async: false,
            data:
                    {
                        ajax: 1,
                    }
        }).done(function(response) {

            setTimeout(function() {
                jQuery("body").removeClass("loading");

                jQuery("#banner").html(response['slider']);
                jQuery(".book_content").html(response['product_content']);
            }, 1200)

        });


    },
    /**
     * to update element on ajax all
     * @param {type} ajax_url
     * @param {type} update_element_id
     * @param {type} resource_elem_id
     * @param {type} action of system
     * @returns {undefined}
     */
    updateEbookElementAjaxJson: function(ajax_url, resource_elem_id, action) {

        /***
         * only the case in which redirection is needed
         */
        if (action == "contactUs") {
            window.location = ajax_url;
            return true;
        }
        jQuery("body").addClass("loading");

        if (jQuery("#" + resource_elem_id).val() != "") {



            jQuery.ajax({
                type: "POST",
                url: ajax_url,
                dataType: "json",
                async: false,
                data:
                        {
                            resource_elem_id: !(resource_elem_id != "") ? jQuery("#" + resource_elem_id).val() : "",
                            ajax: 1,
                        }
            }).done(function(response) {
                
                setTimeout(function() {
                    jQuery("body").removeClass("loading");

                    jQuery(".book_content").html(response['product_content']);
                }, 1200)

            });
        }

    },
    /**
     * to update element on ajax all
     * @param {type} ajax_url
     * @param {type} update_element_id
     * @param {type} resource_elem_id
     * @param {type} action of system
     * @returns {undefined}
     */
    loadHomeAgain: function(ajax_url, resource_elem_id, action) {

        /***
         * only the case in which redirection is needed
         */
        
        if (action == "contactUs") {
            window.location = ajax_url;
            return true;
        }
        jQuery("body").addClass("loading");
        if (jQuery("#" + resource_elem_id).val() != "") {
            jQuery.ajax({
                type: "POST",
                url: ajax_url,
                dataType: "json",
                async: false,
                data:
                        {
                            resource_elem_id: !(resource_elem_id != "") ? jQuery("#" + resource_elem_id).val() : "",
                            ajax: 1,
                        }
            }).done(function(response) {

                setTimeout(function() {
                    jQuery("body").removeClass("loading");
                    var html_start = "<article>";
                    html_start += response['apps'];
                    html_start += response['books'];
                    html_start += "</article>";

                    jQuery("#banner").html(html_start);
                    jQuery(".book_content").html("");

                }, 1200)

            });
        }

    },
}


