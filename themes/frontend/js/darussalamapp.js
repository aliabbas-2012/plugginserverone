/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * custom coding
 */
var dtech_app = {
    json_catalogue: [],
    /**
     * custom slider carousal
     */
    runCatalogueSlider: function(obj, dir) {
        margin_wid = jQuery("#catimonial-list li").width();
        $('#catimonial-list li').removeClass("current_cat");

        if (dir == "left") {
            var $last = $('#catimonial-list li:last');
            $last.remove().css({'margin-left': '-' + margin_wid + 'px'});
            $('#catimonial-list li:first').before($last);
            $last.animate({'margin-left': '0px'}, 2000);
            $('#catimonial-list li:first').addClass("current_cat");
        }
        else {
            var $first = $('#catimonial-list li:first');
            $first.animate({'margin-left': '-' + margin_wid + 'px'}, 2000, function() {
                $first.remove().css({'margin-left': '0px'});
                $('#catimonial-list li:last').after($first);
                $first.addClass("current_cat");
            });
        }

        //in case of first selected and last selected
        if (!jQuery(".yiiPager li.page:last").hasClass("selected")) {
            setTimeout(function() {
                /**
                 * updating content now on other pagas
                 */

                //jQuery("body").addClass("loading");
                current_page = jQuery(".yiiPager li.selected");
                jQuery.ajax({
                    type: "POST",
                    url: current_page.next().children().eq(0).attr("href") + "&slider=1",
                    async: false,
                    data:
                            {
                                ajax: 1,
                            },
                }).done(function(response) {
                    current_page.removeClass("selected");
                    current_page.next().addClass("selected");

                    //jQuery("body").removeClass("loading");

                    response = response.replace('<ul id="catimonial-list" class="clearfix">', "");
                    response = response.replace('</ul>', "");
                    jQuery("#catimonial-list li:last").before(response);

                    if (dir == "left") {

                        jQuery("#catimonial-list >li:first").next().remove();
                    }
                    else {
                        jQuery("#catimonial-list >li:last").prev().remove();
                    }

                });
            }, 2000)
        }

    },
    /**bootstrap slider click on arrow direction**/
    moveArrowDir: function(obj, dir) {

        if (jQuery("#brands-carousel .carousel-inner .item:last").hasClass("active") && dir == "next" && jQuery(".yiiPager li.page.selected").next().hasClass("page")) {
            jQuery(".yiiPager li.page.selected").next().children().eq(0).trigger('click');
        }
        else if (jQuery("#brands-carousel .carousel-inner .item:first").hasClass("active") && dir == "prev" && jQuery(".yiiPager li.page.selected").prev().hasClass("page")) {
            jQuery(".yiiPager li.page.selected").prev().children().eq(0).trigger('click');
        }
        else {

            //for checking 
            if (jQuery("#brands-carousel .carousel-inner .item.active").next().children().eq(0).children().eq(0).children().length == 1) {
                jQuery(".cat-left-arrow,.cat-right-arrow").addClass("catalogue-one");
            }
            else if (jQuery("#brands-carousel .carousel-inner .item.active").next().children().eq(0).children().eq(0).children().length == 2) {
                jQuery(".cat-left-arrow,.cat-right-arrow").addClass("catalogue-two");
            }
            else if (jQuery("#brands-carousel .carousel-inner .item.active").next().children().eq(0).children().eq(0).children().length == 3) {
                jQuery(".cat-left-arrow,.cat-right-arrow").addClass("catalogue-three");
            }
            else {
                jQuery(".cat-left-arrow,.cat-right-arrow").removeClass("catalogue-one");
                jQuery(".cat-left-arrow,.cat-right-arrow").removeClass("catalogue-two");
                jQuery(".cat-left-arrow,.cat-right-arrow").removeClass("catalogue-three");

            }

            jQuery("#brands-carousel").carousel(dir);



        }

    },
    /*######################## Normal ajax ################# **/
    /**
     * to update element on ajax all
     * @param {type} ajax_url
     * @param {type} update_element_id
     * @param {type} resource_elem_id
     * @param {type} action of system
     * @returns {undefined}
     */
    updateElementAjax: function(ajax_url, update_element_id, resource_elem_id, action, is_append) {

        /***
         * only the case in which redirection is needed
         */
        if (action == "contactUs" || action == "ideas" || action == 'jobs') {
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
                    //in case of this is_append flag
                    // products will be appended

                    if (is_append == true) {

                        jQuery("#" + update_element_id).append(response);
                    }
                    else {
                        jQuery("#" + update_element_id).html(response);
                    }
                }, 1200)

            });
        }

    },
    updatefacebooklike: function(ajax_url, url) {


        jQuery.ajax({
            type: "POST",
            url: ajax_url,
            async: false,
            dataType: "json",
            data:
                    {
                        ajax: 1,
                        url: url,
                    }
        }).done(function(response) {
            if(typeof(response['redirect_url'])!== "undefined"){
                window.location = response['redirect_url'];
            }

        });


    },
    /**
     * ajax request for search
     * 
     * @param {type} obj
     * @returns {Boolean}
     */
    disableDatapageAjax: function(obj) {

        var postData = jQuery("#search-form").serializeArray();

        jQuery("body").addClass("loading");
        $.ajax(
                {
                    url: typeof(jQuery(obj).attr("href") != "undefined") ? jQuery(obj).attr("href") : jQuery("#search-form").attr('action'),
                    type: "POST",
                    data: postData,
                    success: function(data, textStatus, jqXHR)
                    {
                        jQuery("#contents").html(data);


                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        //if fails      
                    }
                }).done(function() {

            setTimeout(function() {
                jQuery("body").removeClass("loading");

            }, 1200)

        });
        return false;
    },
    /**
     * to update element on ajax all
     * @param {type} ajax_url
     * @param {type} update_updateElementAjaxelement_id
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
    /**
     * jquery pagination
     * @returns {undefined}
     */
    registerScrollUsingPluggin: function() {
        jQuery("#abount_us_page").onePageNav({
            begin: function() {
                obj = jQuery(this);
                jQuery("#abount_us_page li span").hide();
                jQuery("#abount_us_page li").removeClass("activelist");

            },
            end: function() {
                obj = jQuery(this);
                if (obj[0].currentId == "#founder") {
                    jQuery(document).scrollTop(0);
                }

                jQuery(".about-top").css({"margin-top": 25});

                jQuery('a[href="' + obj[0].currentId + '"]').parent().addClass("activelist")
                jQuery('a[href="' + obj[0].currentId + '"]').prev().show();



            }
        })

    },
    moveFromLeft: function(b) {
        jQuery(b).show("slide", {
            direction: "left"
        }, 1500, "")
    },
    moveFromBottom: function(b) {
        jQuery(b).show("slide", {
            direction: "down"
        }, 1500, "")
    },
    moveFromLeftTimeOut: function(c, d) {
        setTimeout(function() {
            jQuery(c).show("slide", {
                direction: "right",
                complete: function() {
                    jQuery(c).addClass(d)
                }
            }, 1500, "", function() {
            })
        }, 1000)
    },
    moveFromTopTimeOut: function(c, d) {
        setTimeout(function() {
            jQuery(c).show("slide", {
                direction: "up",
                complete: function() {
                    jQuery(c).addClass(d)
                }
            }, 1500, "", function() {
            })
        }, 1000)
    },
    moveFromBottomTimeOut: function(c, d) {
        setTimeout(function() {
            jQuery(c).show("slide", {
                direction: "down",
                complete: function() {
                    jQuery(c).addClass(d)
                }
            }, 1500, "")
        }, 1000)
    },
    moveFromRight: function(b) {
        jQuery(b).show("slide", {
            direction: "right"
        }, 1500, "")
    },
}


