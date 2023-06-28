(function($) {
    'use strict';
    // *************************************
    // Social Share window
    // *************************************
    $(".ultp-post-share-item a").each(function() {
        $(this).click(function() {
            // For Share window opening
            let share_url = $(this).attr("url");
            let width = 800;
            let height = 500;
            let leftPosition, topPosition;
            //Allow for borders.
            leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
            //Allow for title and status bars.
            topPosition = (window.screen.height / 2) - ((height / 2) + 50);
            let windowFeatures = "height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition;
            window.open(share_url,'sharer', windowFeatures);
            // For Share count add
            let id = $(this).parents(".ultp-post-share-item-inner-block").attr("postId");
            let count = $(this).parents(".ultp-post-share-item-inner-block").attr("count");
            $.ajax({
                url: ultp_data_frontend.ajax,
                type: 'POST',
                data: {
                    action: 'ultp_share_count', 
                    shareCount:count, 
                    postId: id,
                    wpnonce: ultp_data_frontend.security
                },
                error: function(xhr) {
                    console.log('Error occured.please try again' + xhr.statusText + xhr.responseText );
                },
            });
            
            return false;
        })
    })
    // remove sticky behavior when footer is visible
    $(window).scroll(function() {
        if ($(window).scrollTop() + window.innerHeight >= $('footer')?.offset()?.top) {
            $('.wp-block-ultimate-post-post_share .ultp-block-wrapper .ultp-disable-sticky-footer').addClass("remove-sticky");
        } else {
            $('.wp-block-ultimate-post-post_share .ultp-block-wrapper .ultp-disable-sticky-footer').removeClass("remove-sticky");
        }
    });

    // *************************************
    // News Ticker
    // *************************************
    $('.ultp-news-ticker').each( function () {
        $(this).UltpSlider({
            type: $(this).data('type'),
            direction: $(this).data('direction'),
            speed: $(this).data('speed'),
            pauseOnHover: $(this).data('hover') == 1 ? true : false,
            controls: {
                prev: $(this).closest('.ultp-newsTicker-wrap').find('.ultp-news-ticker-prev'),
                next: $(this).closest('.ultp-newsTicker-wrap').find('.ultp-news-ticker-next'),
                toggle: $(this).closest('.ultp-newsTicker-wrap').find('.ultp-news-ticker-pause')
            }
        });
    });

    // *************************************
    // Table of Contents
    // *************************************
    $(".ultp-toc-backtotop").click(function(e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });
    
    $(window).scroll(function() {
        scrollTopButton(); 
    });

    function scrollTopButton() {
        if ($(document).scrollTop() > 1000) {
            $('.ultp-toc-backtotop').addClass('tocshow');
            $('.wp-block-ultimate-post-table-of-content').addClass('ultp-toc-scroll');
        } else {
            $('.ultp-toc-backtotop').removeClass('tocshow');
            $('.wp-block-ultimate-post-table-of-content').removeClass('ultp-toc-scroll');
        }
    }
    scrollTopButton();

    $(".ultp-collapsible-open").click(function(e) {
        $('.ultp-collapsible-toggle').removeClass('ultp-toggle-collapsed');
        $('.ultp-block-toc-body').show();
    });

    $(".ultp-collapsible-hide").click(function(e) {
        $('.ultp-collapsible-toggle').addClass('ultp-toggle-collapsed');
        $('.ultp-block-toc-body').hide();
    });
    
    $(".ultp-toc-lists li a").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $($(this).attr('href')).offset().top - 50
        }, 500);
    });  


    // *************************************
    // Flex Menu
    // *************************************
    $(document).ready(function() {
        if ($('.ultp-flex-menu').length > 0) {
            const menuText = $('ul.ultp-flex-menu').data('name');
            $('ul.ultp-flex-menu').flexMenu({linkText: menuText, linkTextAll: menuText, linkTitle: menuText});
        }
    });
    $(document).on("click", function (e) {
        if ($(e.target).closest(".flexMenu-viewMore").length === 0) {
            $('.flexMenu-viewMore').removeClass('active');
            $('.flexMenu-viewMore').children("ul.flexMenu-popup").css("display","none")
        }
    });
    $(document).on('click', '.ultp-filter-navigation .flexMenu-popup .filter-item', function(e){
        $('.flexMenu-viewMore').removeClass('active');
        $('.flexMenu-viewMore').children("ul.flexMenu-popup").css("display","none")
    });
    
    // *************************************
    // Previous Next
    // *************************************
    
    $(document).off('click', '.ultp-pagination-ajax-action li, .ultp-loadmore-action, .ultp-prev-action, .ultp-next-action', function(e) { })
    $(document).on('click', '.ultp-prev-action, .ultp-next-action', function(e) {
        e.preventDefault();
        let parents = $(this).closest('.ultp-next-prev-wrap'),
            wrap    = parents.closest('.ultp-block-wrapper').find('.ultp-block-items-wrap'),
            paged   = parseInt(parents.data('pagenum')),
            pages   = parseInt(parents.data('pages'));
        
        if(parents.is('.ultp-disable-editor-click')) {
            return
        }
        if ($(this).hasClass('ultp-prev-action')) {
            if ($(this).hasClass('ultp-disable')) {
                return
            }else{
                paged--;
                parents.data('pagenum', paged);
                parents.find('.ultp-prev-action, .ultp-next-action').removeClass('ultp-disable')
                if (paged == 1) {
                    $(this).addClass('ultp-disable');
                }
            }
        }
        if ($(this).hasClass('ultp-next-action')) {
            if ($(this).hasClass('ultp-disable')) {
                return
            }else{
                paged++;
                parents.data('pagenum', paged);
                parents.find('.ultp-prev-action, .ultp-next-action').removeClass('ultp-disable')
                if (paged == pages) {
                    $(this).addClass('ultp-disable');
                }
            }
        }

        let post_ID = (parents.parents('.ultp-shortcode').length != 0) ? parents.parents('.ultp-shortcode').data('postid') : parents.data('postid');

        if ($(this).closest('.ultp-builder-content').length > 0) {
            post_ID = $(this).closest('.ultp-builder-content').data('postid')
        }
        let widgetBlockId = '';
        let widgetBlock = $(this).parents('.widget_block:first');
        if(widgetBlock.length > 0) {
            let widget_items = widgetBlock.attr('id').split("-");
            widgetBlockId = widget_items[widget_items.length-1]
        }
        const ultpUniqueIds = sessionStorage.getItem('ultp_uniqueIds');
        const ultpCurrentUniquePosts = JSON.stringify(wrap.find('.ultp-current-unique-posts').data('current-unique-posts'));

		$.ajax({
            url: ultp_data_frontend.ajax,
            type: 'POST',
            data: {
                action: 'ultp_next_prev', 
                paged: paged ,
                blockId: parents.data('blockid'),
                postId: post_ID,
                blockName: parents.data('blockname'),
                builder: parents.data('builder'),
                filterValue: parents.data('filter-value') || '',
                filterType: parents.data('filter-type') || '',
                widgetBlockId: widgetBlockId,
                ultpUniqueIds : ultpUniqueIds || [],
                ultpCurrentUniquePosts: ultpCurrentUniquePosts || [],
                wpnonce: ultp_data_frontend.security
            },
            beforeSend: function() {
                parents.closest('.ultp-block-wrapper').addClass('ultp-loading-active')
            },
            success: function(data) {
                if(data) {
                    wrap.html(data);
                    setSession('ultp_uniqueIds', JSON.stringify(wrap.find('.ultp-current-unique-posts').data('ultp-unique-ids')) );
                }
            },
            complete:function() {
                parents.closest('.ultp-block-wrapper').removeClass('ultp-loading-active');
            },
            error: function(xhr) {
                console.log('Error occured.please try again' + xhr.statusText + xhr.responseText );
                parents.closest('.ultp-block-wrapper').removeClass('ultp-loading-active');
            },
        });
    });
       

    // *************************************
    // Loadmore Append
    // *************************************
    
    $(document).on('click', '.ultp-loadmore-action', function(e) {
        if($(this).is('.ultp-disable-editor-click')) {
            return
        }
        e.preventDefault();
        let that    = $(this),
            parents = that.closest('.ultp-block-wrapper'),
            paged   = parseInt(that.data('pagenum')),
            pages   = parseInt(that.data('pages'));
        
        if (that.hasClass('ultp-disable')) {
            return
        }else{
            paged++;
            that.data('pagenum', paged);
            if (paged == pages) {
                $(this).addClass('ultp-disable');
            }else{
                $(this).removeClass('ultp-disable');
            }
        }

        let post_ID = (that.parents('.ultp-shortcode').length != 0) ? that.parents('.ultp-shortcode').data('postid') : that.data('postid');

        if (that.closest('.ultp-builder-content').length > 0) {
            post_ID = that.closest('.ultp-builder-content').data('postid')
        }
        let widgetBlockId = '';
        let widgetBlock = $(this).parents('.widget_block:first');
        if(widgetBlock.length > 0) {
            let widget_items = widgetBlock.attr('id').split("-");
            widgetBlockId = widget_items[widget_items.length-1]
        }

        const ultpUniqueIds = sessionStorage.getItem('ultp_uniqueIds');
        const ultpCurrentUniquePosts = JSON.stringify(parents.find('.ultp-current-unique-posts').data('current-unique-posts'));

        $.ajax({
            url: ultp_data_frontend.ajax,
            type: 'POST',
            data: {
                action: 'ultp_next_prev', 
                paged: paged ,
                blockId: that.data('blockid'),
                postId: post_ID,
                blockName: that.data('blockname'),
                builder: that.data('builder'),
                filterValue: that.closest('.ultp-loadmore').data('filter-value') || '',
                filterType: that.closest('.ultp-loadmore').data('filter-type') || '',
                widgetBlockId: widgetBlockId,
                ultpUniqueIds : ultpUniqueIds || [],
                ultpCurrentUniquePosts: ultpCurrentUniquePosts || [],
                wpnonce: ultp_data_frontend.security
            },
            beforeSend: function() {
                parents.addClass('ultp-loading-active');
            },
            success: function(data) {
                if(data) {
                    parents.find('.ultp-current-unique-posts').remove();
                    $(data).insertBefore( parents.find('.ultp-loadmore-insert-before') );
                    setSession('ultp_uniqueIds', JSON.stringify(parents.find('.ultp-current-unique-posts').data('ultp-unique-ids')) );
                }
            },
            complete:function() {
                parents.removeClass('ultp-loading-active');
            },
            error: function(xhr) {
                console.log('Error occured.please try again' + xhr.statusText + xhr.responseText );
                parents.removeClass('ultp-loading-active');
            },
        });
    });


    // *************************************
    // Filter
    // *************************************
    $(document).on('click', '.ultp-filter-wrap li a', function(e) {
        e.preventDefault();

        if ($(this).closest('li').hasClass('filter-item')) {
            let that    = $(this),
                parents = that.closest('.ultp-filter-wrap'),
                wrap = that.closest('.ultp-block-wrapper');

                parents.find('a').removeClass('filter-active');
                that.addClass('filter-active');
            if(parents.is('.ultp-disable-editor-click')) {
                return
            }
            let post_ID = (parents.parents('.ultp-shortcode').length != 0) ? parents.parents('.ultp-shortcode').data('postid') : parents.data('postid');

            if (that.closest('.ultp-builder-content').length > 0) {
                post_ID = that.closest('.ultp-builder-content').data('postid')
            }
            let widgetBlockId = '';
            let widgetBlock = $(this).parents('.widget_block:first');
            if(widgetBlock.length > 0) {
                let widget_items = widgetBlock.attr('id').split("-");
                widgetBlockId = widget_items[widget_items.length-1]
            }
            if (parents.data('blockid')) {
                $.ajax({
                    url: ultp_data_frontend.ajax,
                    type: 'POST',
                    data: {
                        action: 'ultp_filter', 
                        taxtype: parents.data('taxtype'),
                        taxonomy: that.data('taxonomy'),
                        blockId: parents.data('blockid'),
                        postId: post_ID,
                        blockName: parents.data('blockname'),
                        widgetBlockId: widgetBlockId,
                        wpnonce: ultp_data_frontend.security
                    },
                    beforeSend: function() {
                        wrap.addClass('ultp-loading-active');
                    },
                    success: function(response) {
                        wrap.find('.ultp-block-items-wrap').html(response?.data?.filteredData?.blocks);
                        if(response?.data?.filteredData?.paginationType == 'loadMore' && response?.data?.filteredData?.paginationShow) {
                            wrap.find('.ultp-block-items-wrap').append('<span class="ultp-loadmore-insert-before"></span>');
                            wrap.find('.ultp-loadmore').replaceWith(response?.data?.filteredData?.pagination);
                        }
                        else if(response?.data?.filteredData?.paginationType == 'navigation') {
                            wrap.find('.ultp-next-prev-wrap').replaceWith(response?.data?.filteredData?.pagination);
                        }
                        else if(response?.data?.filteredData?.paginationType == 'pagination') {
                            wrap.find('.ultp-pagination-wrap').replaceWith(response?.data?.filteredData?.pagination);
                        }
                    },
                    complete:function() {
                        wrap.removeClass('ultp-loading-active');
                    },
                    error: function(xhr) {
                        console.log('Error occured.please try again' + xhr.statusText + xhr.responseText );
                        wrap.removeClass('ultp-loading-active');
                    },
                });
            }
        }
    });


    // *************************************
    // Pagination Number
    // *************************************
    function showHide(parents, pageNum, pages) {
        if (pageNum == 1) {
            parents.find('.ultp-prev-page-numbers').hide()
            parents.find('.ultp-next-page-numbers').show()
        } else if (pageNum == pages) {
            parents.find('.ultp-prev-page-numbers').show()
            parents.find('.ultp-next-page-numbers').hide()
        } else {
            parents.find('.ultp-prev-page-numbers').show()
            parents.find('.ultp-next-page-numbers').show()
        }


        if (pageNum > 2) {
            parents.find('.ultp-first-pages').show()
            parents.find('.ultp-first-dot').show()
        }else{
            parents.find('.ultp-first-pages').hide()
            parents.find('.ultp-first-dot').hide()
        }
        
        if (pages > pageNum + 1) {
            parents.find('.ultp-last-pages').show()
            parents.find('.ultp-last-dot').show()
        }else{
            parents.find('.ultp-last-pages').hide()
            parents.find('.ultp-last-dot').hide()
        }
    }

    function serial(parents, pageNum, pages) {
        let datas = pageNum <= 2 ? [1,2,3] : ( pages == pageNum ? [pages-2,pages-1, pages] : [pageNum-1,pageNum,pageNum+1] )
        let i = 0
        parents.find('.ultp-center-item').each(function() {
            if (pageNum == datas[i]) {
                $(this).addClass('pagination-active')
            }
            $(this).find('a').blur();
            $(this).attr('data-current', datas[i]).find('a').text(datas[i])
            i++
        });
    }

    // set session value for unique content on page reload
    if ( $('.ultp-current-unique-posts').length > 0 ) {
        $('.ultp-current-unique-posts').each( function () {
            setSession('ultp_uniqueIds', JSON.stringify($(this).data('ultp-unique-ids')) );
        });
    }
    // session value set function
    function setSession(key, value) {
        if(value != undefined) {
            sessionStorage.setItem(key, value );
        }
    }

    $(document).on('click', '.ultp-pagination-ajax-action li', function(e) {
        e.preventDefault();
        let that    = $(this),
            parents = that.closest('.ultp-pagination-ajax-action'),
            wrap = that.closest('.ultp-block-wrapper');
        if(parents.is('.ultp-disable-editor-click')) {
            return
        }
        let pageNum = 1;
        let pages = parents.attr('data-pages');
        
        if (that.attr('data-current')) {
            pageNum = Number(that.attr('data-current'))
            parents.attr('data-paged', pageNum).find('li').removeClass('pagination-active')
            serial(parents, pageNum, pages)
            showHide(parents, pageNum, pages)
        } else {
            if (that.hasClass('ultp-prev-page-numbers')) {
                pageNum = Number(parents.attr('data-paged')) - 1
                parents.attr('data-paged', pageNum).find('li').removeClass('pagination-active')
                //parents.find('li[data-current="'+pageNum+'"]').addClass('pagination-active')
                serial(parents, pageNum, pages)
                showHide(parents, pageNum, pages)
            } else if (that.hasClass('ultp-next-page-numbers')) {
                pageNum = Number(parents.attr('data-paged')) + 1
                parents.attr('data-paged', pageNum).find('li').removeClass('pagination-active')
                //parents.find('li[data-current="'+pageNum+'"]').addClass('pagination-active')
                serial(parents, pageNum, pages)
                showHide(parents, pageNum, pages)
            }
        }

        let post_ID = (parents.parents('.ultp-shortcode').length != 0) ? parents.parents('.ultp-shortcode').data('postid') : parents.data('postid');

        if (that.closest('.ultp-builder-content').length > 0) {
            post_ID = that.closest('.ultp-builder-content').data('postid')
        }
        let widgetBlockId = '';
        let widgetBlock = $(this).parents('.widget_block:first');
        if(widgetBlock.length > 0) {
            let widget_items = widgetBlock.attr('id').split("-");
            widgetBlockId = widget_items[widget_items.length-1]
        }

        const ultpUniqueIds = sessionStorage.getItem('ultp_uniqueIds');
        const ultpCurrentUniquePosts = JSON.stringify(wrap.find('.ultp-current-unique-posts').data('current-unique-posts'));

        if (pageNum) {
            $.ajax({
                url: ultp_data_frontend.ajax,
                type: 'POST',
                data: {
                    action: 'ultp_pagination', 
                    paged: pageNum,
                    blockId: parents.data('blockid'),
                    postId: post_ID,
                    blockName: parents.data('blockname'),
                    builder: parents.data('builder'),
                    filterValue: parents.data('filter-value') || '',
                    filterType: parents.data('filter-type') || '',
                    widgetBlockId: widgetBlockId,
                    ultpUniqueIds : ultpUniqueIds || [],
                    ultpCurrentUniquePosts: ultpCurrentUniquePosts || [],
                    wpnonce: ultp_data_frontend.security
                },
                beforeSend: function() {
                    wrap.addClass('ultp-loading-active');
                },
                success: function(data) {
                    wrap.find('.ultp-block-items-wrap').html(data);
                    setSession('ultp_uniqueIds', JSON.stringify(wrap.find('.ultp-current-unique-posts').data('ultp-unique-ids')) );
                    if ($(window).scrollTop() > wrap.offset().top) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: wrap.offset().top - 80
                        }, 100);
                    }
                },
                complete:function() {
                    wrap.removeClass('ultp-loading-active');
                },
                error: function(xhr) {
                    console.log('Error occured.please try again' + xhr.statusText + xhr.responseText );
                    wrap.removeClass('ultp-loading-active');
                },
            });
        }
    });
    
    // *************************************
    // SlideShow
    // *************************************
    
    // Slideshow Display For Elementor via Shortcode
    $( window ).on( 'elementor/frontend/init', () => {
        setTimeout( () => {
            if ($('.elementor-editor-active').length > 0) {
                slideshowDisplay();
            }
        }, 2000);
    });
    
    function slideshowDisplay() {
        $('.wp-block-ultimate-post-post-slider-1, .wp-block-ultimate-post-post-slider-2').each(function () {
            const sectionId = '#' + $(this).attr('id');
            let selector = $(sectionId).find('.ultp-block-items-wrap');
            if($(this).parent('.ultp-shortcode')) {
                selector = $(this).find('.ultp-block-items-wrap');
            }
            let settings = {
                arrows: true,
                dots: selector.data('dots') ? true : false,
                infinite: true,
                speed: 500,
                slidesToShow: selector.data('slidelg') || 1,
                slidesToScroll: 1,
                autoplay: selector.data('autoplay') ? true : false,
                autoplaySpeed: selector.data('slidespeed') || 3000,
                cssEase: "linear",
                prevArrow: selector.parent().find('.ultp-slick-prev').html(),
                nextArrow: selector.parent().find('.ultp-slick-next').html(),
            };
            
            let layTemp = selector.data('layout') == "slide2" || selector.data('layout') == "slide3"  || selector.data('layout') == "slide5" || selector.data('layout') == "slide6"  || selector.data('layout') == "slide8" ;

            if(!selector.data('layout')) { // Slider 1
                if (selector.data('slidelg') < 2) {
                    settings.fade = selector.data('fade') ? true : false
                } else {
                    settings.responsive = [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: selector.data('slidesm') || 1,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: selector.data('slidexs') || 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                }
            } else { // Slider 2
                if( selector.data('fade') && layTemp) {
                    settings.fade = selector.data('fade') ? true : false;
                } else if ( !(selector.data('fade')) && layTemp) {
                    settings.slidesToShow = selector.data('slidelg') || 1,
                    settings.responsive = [
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: selector.data('slidesm') || 1,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: selector.data('slidexs') || 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                }  else {
                        settings.slidesToShow = selector.data('slidelg') || 1,
                        settings.centerMode =  true;
                        settings.centerPadding = `${selector.data('paddlg')}px` || 100
                        settings.responsive = [
                            {
                                breakpoint: 991,
                                settings: {
                                    slidesToShow: selector.data('slidesm') || 1,
                                    slidesToScroll: 1,
                                    centerPadding: `${selector.data('paddsm')}px` || 50,
                                }
                            },
                            {
                                breakpoint: 767,
                                settings: {
                                    slidesToShow: selector.data('slidexs') || 1,
                                    slidesToScroll: 1,
                                    centerPadding: `${selector.data('paddxs')}px` || 50,
                                }
                            }
                        ]
                }
            }
            selector.not('.slick-initialized').slick(settings);
        });
    }
    slideshowDisplay();

    // *************************************
    // Accessibility for Loadmore Added
    // *************************************
    $('span[role="button"]').on('keydown', function (e) {
        const keyD = e.key !== undefined ? e.key : e.keyCode;
        if ((keyD === 'Enter' || keyD === 13) || (['Spacebar', ' '].indexOf(keyD) >= 0 || keyD === 32)) {
            e.preventDefault();
            this.click();
        }
    });

    // *************************************
    // Post Grid Popup Modal 
    // *************************************
    $(document).on('click', '.ultp-block-item .ultp-video-icon', function () {
        let parent = $(this).parents('.ultp-block-item');
        let videoIframe = parent.find('iframe');
        let isAutoPlay = parent.find('.ultp-video-icon').attr('enableAutoPlay');
        // Update Src For Autoplay
        if(videoIframe.attr('src') && isAutoPlay){
            videoIframe.attr('src', `${videoIframe.attr('src')}&autoplay=1`);
        }
        // Add Modal Active Class
        parent.find('.ultp-video-modal').addClass('modal_active');
        // Spinner for Video
        parent.find('iframe').on("load", function() {
            $('.ultp-loader-container').css('display','none');
        });
    });
    $(document).on('click', '.ultp-video-close, .ultp-video-modal__overlay', function () {
        let parent = $(this).parents('.ultp-block-item');
        let videoIframe = parent.find('iframe');
        let isAutoPlay = parent.find('.ultp-video-icon').attr('enableAutoPlay');
        // Remove Modal Class
        parent.find('.ultp-video-modal').removeClass('modal_active');
        // Update Src For off Autoplay
        if(videoIframe.attr('src') && isAutoPlay){
            let stopvideo = videoIframe.attr('src').replace("&autoplay=1", "");
            videoIframe.attr('src', stopvideo);
        }
    })
    // Escape for close modal
    $(document).on('keyup', function(e) {
        if (e.key == "Escape"){
            $('.ultp-video-modal').removeClass('modal_active');
            // Update Src For off Autoplay
            if(videoIframe.attr('src')){
                let stopvideo = videoIframe.attr('src').replace("&autoplay=1", "");
                videoIframe.attr('src', stopvideo);
            }
        }
    });

    // *************************************
    //  Video Scroll
    // *************************************
    let isSticky = true;
    $(window).scroll(function() {
        let windowHeight = $(this).scrollTop();
        $('.wp-block-ultimate-post-post-image').each(function(){
            let contentSelector = $(this).find('.ultp-builder-video video , .ultp-builder-video iframe');
            if($(this).find('.ultp-video-block').hasClass('ultp-sticky-video')){
                // block height and position
                let blockContent = $(this).find('.ultp-image-wrapper');
                let blockPosition = blockContent.offset();
                // Video Html height and position
                let videoContent = contentSelector.height();
                let videoPosition = contentSelector.offset();
                // Exclude Adminbar height
                let windowTotalHeight = windowHeight + ($('#wpadminbar').height() || 0);
                let totalHeight =  videoPosition.top + videoContent;
                // Scrolling Top to bottom
                if((windowTotalHeight > videoPosition.top)){
                    if(windowTotalHeight > totalHeight && isSticky){
                        $(this).find('.ultp-image-wrapper').css('height', blockContent.height())
                        $(this).find('.ultp-sticky-video').addClass('ultp-sticky-active');
                    }
                }
                // Scrolling bottom to top
                if(windowTotalHeight < (blockContent.height() + blockPosition.top)){
                    $(this).find('.ultp-sticky-video').removeClass('ultp-sticky-active');
                    $(this).find('.ultp-image-wrapper').css('height', 'auto')
                }
                // Close Button
                $('.ultp-sticky-close').on('click', function(){
                    $(this).find('.ultp-image-wrapper').css('height', 'auto')
                    $('.ultp-sticky-video').removeClass('ultp-sticky-active');
                    isSticky = false;
                })
            }
        })
    });
    
})( jQuery );