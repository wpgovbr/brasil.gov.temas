/* - sdh.tema.default.js - */
// http://www.sdh.gov.br/portal_javascripts/sdh.tema.default.js?original=1
var formatTemplateMultimidia;
var SDH = {init: function() {
        this.contrast();
        this.menuFix();
        this.socialPage();
        this.paneletSlider();
        this.imagesFix();
        this.audioPlayer();
        this.carousels();
        this.changeTitles();
        this.paneletEvents();
        this.printPdf();
        this.generateSitemap();
        this.blogPosts();
        this.generateGlossary();
        this.generateFilters();
        this.generateTampleteMultimedia();
        this.sectionZmi();
        this.isMobile()
    },contrast: function() {
        $('#contraste_icones .esp a').click(function(e) {
            e.preventDefault();
            if ((getCookie('mysheet') == 'contrast')) {
                chooseStyle('none')
            } else {
                chooseStyle('contrast', 60)
            }
        })
    },menuFix: function() {
        $('.menu-accessibilidade a').each(function() {
            var sHref = $(this).attr('href');
            this.href = window.location.href + sHref
        });
        $('a[href$="#searchGadget"]').click(function() {
            $('#searchGadget').focus()
        });
        $('.navmain li').each(function() {
            if ($(this).height() > 33 && $(this).height() <= 47) {
                $(this).find('a').addClass('big')
            }
        });
        var altura_item_menu = $('.link').find('ul').parent().find('a').eq(0);
        if (altura_item_menu.height() > 20 && altura_item_menu.height() !== 'null') {
            altura_item_menu.removeClass('big').addClass('big')
        }
        $('.activeLink').find('.hover').remove();
        if (!!("ontouchstart" in document.documentElement)) {
            document.documentElement.className += " touch"
        }
    },socialPage: function() {
        if ($('ul.tabs').length > 0) {
            $('ul.tabs').tabs('div.panes > div');
            $('ul.tabs li a').click(function(e) {
                e.preventDefault()
            })
        }
    },paneletSlider: function() {
        if ($('#slider').length > 0) {
            $('#slider .button-nav').click(function(e) {
                e.preventDefault();
                $('#slider .button-nav').removeClass('activeSlide');
                $(this).addClass('activeSlide');
                $('#slider .slide').removeClass('activeSlideItem');
                $(this).parent().find('.slide').addClass('activeSlideItem')
            });
            $('#slider .button-nav').focus(function(e) {
                e.preventDefault();
                $('#slider .button-nav').removeClass('activeSlide');
                $(this).addClass('activeSlide');
                $('#slider .slide').removeClass('activeSlideItem');
                $(this).parent().find('.slide').addClass('activeSlideItem')
            });
            $('#slider .button-nav').hover(function(e) {
                e.preventDefault();
                $('#slider .button-nav').removeClass('activeSlide');
                $(this).addClass('activeSlide');
                $('#slider .slide').removeClass('activeSlideItem');
                $(this).parent().find('.slide').addClass('activeSlideItem')
            });
            var updateCarrossel = function() {
                if (($('#slider a:hover').length == 0) && ($('#slider a:focus').length == 0)) {
                    var totalSlides = 4;
                    var activeSlide = $('#slider .activeSlide');
                    var activeSlideItem = $('#slider .activeSlideItem');
                    var activeSlideNumber = parseInt(activeSlide.html());
                    var nextSlideNumber = (activeSlideNumber % totalSlides) + 1;
                    var nextSlide = $('#slide' + nextSlideNumber + ' .button-nav');
                    var nextSlideItem = $('#slide' + nextSlideNumber + ' .slide');
                    $('#slider .button-nav').removeClass('activeSlide');
                    $('#slider .slide').removeClass('activeSlideItem');
                    nextSlide.addClass('activeSlide');
                    nextSlideItem.addClass('activeSlideItem')
                }
                window.setTimeout(updateCarrossel, 4000)
            }
            window.setTimeout(updateCarrossel, 4000)
        }
    },imagesFix: function() {
        $('.template-programa_view #content-core img, ' + '.template-document_view #content-core img, ' + '.programa_view_sem_modulo #content-core img, ' + '.document_view_com_modulo #content-core img').each(function() {
            var thisItem = $(this);
            var thisClass = thisItem.attr('class').split(" ")[0];
            var urlImagem = thisItem.attr('src');
            thisItem.removeClass(thisClass);
            $.get(urlImagem + '/Rights', function(creditos) {
                if (creditos !== "") {
                    $('<div class="creditos">Foto: ' + creditos + '</div>').insertBefore(thisItem)
                }
            });
            $.get(urlImagem + '/Description', function(descricao) {
                if (descricao !== "") {
                    $('<div class="legenda">Legenda: ' + descricao + '</div>').insertAfter(thisItem)
                }
            });
            thisItem.wrap('<div class="imagemComCredito ' + thisClass + '" />')
        });
        if ($('.programa-imagem').length > 0) {
            var imagem = $('#content-core img:first').parent();
            $('.programa-imagem').append(imagem);
            $('.programa-imagem img').width(300).parent().removeClass('image-inline')
        }
        if ($('.scroll-pane').length > 0) {
            var tamanho = $('#carrossel-itens li').size() * 240;
            $('#carrossel-itens').width(tamanho)
        }
        if ($('.scroll-pane-duas-chamadas').length > 0) {
            $('#content #painel-duas-chamadas-itens').width(480)
        }
        if (($('#portal-personaltools').length > 0) && ($('.template-document_view #content-core .imagemComCredito img').length > 0)) {
            $('.template-document_view #content-core .imagemComCredito img').each(function(index) {
                var src = $(this).attr('src');
                $(this).after('<p><a href="' + src + '/edit">Editar Imagem</a></p>')
            })
        }
        if ($('.template-image_view #content-core a img').length > 0) {
            $('.template-image_view #content-core a img').removeAttr('height');
            $('.template-image_view #content-core a img').removeAttr('width')
        }
    },audioPlayer: function() {
        if ($("#audio-atual-news").length > 0) {
            $('.list-folder .item-folder a.item-link').click(function(e) {
                e.preventDefault();
                var title, file, description, object, top;
                title = $(this).find('.item-link-title').text();
                file = $(this).attr('href');
                description = $(this).find('.item-link-description').text();
                $('#audio-atual-news .head-title').text(title);
                $('#audio-atual-news .description').text(description);
                object = '<object align="middle" width="215" height="40" id="player_audio">';
                object += '<param value="player_215_40.swf?caminho=';
                object += file;
                object += '/at_download/arquivo" name="movie" />';
                object += '<param value="transparent" name="wmode" />';
                object += '<embed width="215" height="40" ';
                object += 'wmode="transparent" pluginspage="http://www.adobe.com/go/getflashplayer" ';
                object += 'type="application/x-shockwave-flash" allowfullscreen="false" ';
                object += 'allowscriptaccess="sameDomain" name="player_audio" ';
                object += 'bgcolor="#ffffff" quality="high" ';
                object += 'src="player_215_40.swf?caminho=';
                object += file;
                object += '/at_download/arquivo" />';
                object += '</object>';
                $('#audio-atual-news .audio-player').html(object);
                top = $('.multimidia-audios-player').offset().top + 'px';
                $('body, html').animate({scrollTop: top})
            })
        }
    },carousels: function() {
        var carrossel_audio_news = $('#carrossel-audios-news');
        if (carrossel_audio_news.length > 0) {
            carrossel_audio_news.jcarousel({vertical: false,scroll: 1,wrap: 'last'});
            $('#nav-audios-news .prev').click(function(e) {
                e.preventDefault();
                carrossel_audio_news.jcarousel('scroll', '-=1')
            });
            $('#nav-audios-news .next').click(function(e) {
                e.preventDefault();
                carrossel_audio_news.jcarousel('scroll', '+=1')
            })
        }
        var carrossel_imagens_videos = $('#carrossel-imagens-news');
        if (carrossel_imagens_videos.length > 0) {
            carrossel_imagens_videos.jcarousel({vertical: false,scroll: 1,wrap: 'last'});
            $('#nav-imagens-news .prev').click(function(e) {
                e.preventDefault();
                carrossel_imagens_videos.jcarousel('scroll', '-=1')
            });
            $('#nav-imagens-news .next').click(function(e) {
                e.preventDefault();
                carrossel_imagens_videos.jcarousel('scroll', '+=1')
            })
        }
        carrossel_imagens_videos = $('#carrossel-videos-news');
        if (carrossel_imagens_videos.length > 0) {
            carrossel_imagens_videos.jcarousel({vertical: false,scroll: 1,wrap: 'last'});
            $('#nav-videos-news .prev').click(function(e) {
                e.preventDefault();
                carrossel_imagens_videos.jcarousel('scroll', '-=1')
            });
            $('#nav-videos-news .next').click(function(e) {
                e.preventDefault();
                carrossel_imagens_videos.jcarousel('scroll', '+=1')
            });
            $('#carrossel-videos-news ul li a').unbind('click').bind('click', function(e) {
                e.preventDefault();
                var yCode = $(this).find('input[name="remoteurl"]').val(), remoteUrl = 'http://youtube.com/v/' + yCode + '?modestbranding=1&amp;autohide=1&amp;showinfo=0&amp;controls=0', title = $(this).find('input[name="title"]').val();
                if ($('#video-atual-news iframe').attr('src') !== remoteUrl) {
                    $('#video-atual-news iframe').attr('src', remoteUrl);
                    $('#video-atual-news .caption').html(title)
                }
            })
        }
    },changeTitles: function() {
        $('#carrossel-imagens-news ul li a').unbind('click').bind('click', function(e) {
            e.preventDefault();
            var remoteUrl = $(this).attr('href'), title = $(this).find('input[name="title"]').val();
            if ($('#imagem-atual-news img').attr('src') !== remoteUrl) {
                $('#imagem-atual-news img').fadeOut(function() {
                    $('#imagem-atual-news img').attr('src', remoteUrl);
                    $('#imagem-atual-news .caption').html(title);
                    $('#imagem-atual-news img').fadeIn()
                })
            }
        });
        if ($(".multimidia-imagem-player").length > 0) {
            $('.list-folder .item-folder a.item-link').click(function(e) {
                e.preventDefault();
                var title, file, description, top;
                title = $(this).find('.item-link-title').text();
                file = $(this).attr('href');
                description = $(this).find('.item-link-description').text();
                $('.multimidia-imagem-player .head-title').text(title);
                $('.multimidia-imagem-player .description').text(description);
                $('.multimidia-imagem-player .portlet-imagem-player a').attr({'href': file + '/image'});
                $('.multimidia-imagem-player .portlet-imagem-player a img').attr({'src': file + '/image_conteudo','alt': ((description !== '') ? description : title)});
                top = $('.multimidia-imagem-player').offset().top + 'px';
                $('body, html').animate({scrollTop: top})
            })
        }
        if ($(".multimidia-video-player").length > 0) {
            $('.multimidia-list-videos .list-folder .item-folder a.item-link').live("click", function(e) {
                e.preventDefault();
                var title, description, top, itemvideoid;
                title = $(this).find('.item-link-title').text();
                itemvideoid = $(this).find('.item-link-itemvideoid').text();
                description = $(this).find('.item-link-description').text();
                $('.multimidia-video-player .head-title').text(title);
                $('.multimidia-video-player .description').text(description);
                $('.multimidia-video-player #player_video').attr('src', 'http://www.youtube.com/embed/' + itemvideoid);
                top = $(".multimidia-video-player").offset().top + 'px';
                $('body, html').animate({scrollTop: top})
            })
        }
    },paneletEvents: function() {
        if ($('.panelet_filtro_agenda').length > 0) {
            var constroiAgenda = function(json) {
                var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                var portletAgenda = $('.portlet_agenda');
                if (portletAgenda.length > 0) {
                    var htmlH4PortletTitle;
                    portletAgenda.html(null);
                    if (json.length > 0) {
                        htmlH4PortletTitle = $('<h3></h3>');
                        htmlH4PortletTitle.text(meses[json[0].data_inicio.mes - 1]);
                        htmlH4PortletTitle.attr({'class': 'portlet-title'});
                        portletAgenda.append(htmlH4PortletTitle);
                        var htmlUlPortletItems = $('<ul></ul>');
                        htmlUlPortletItems.attr({'class': 'portlet-items lista-agenda'});
                        $.each(json, function(i, evento) {
                            var htmlLiPortletItem = $('<li></li>');
                            htmlLiPortletItem.attr({'class': 'portlet-item'});
                            var htmlSpanItemDate = $('<span></span>');
                            htmlSpanItemDate.attr({'class': 'item-date'});
                            var htmlSpanStart = $('<span></span>');
                            htmlSpanStart.attr({'class': 'start'});
                            htmlSpanStart.text(evento.data_inicio_string.dia + '/' + evento.data_inicio_string.mes);
                            htmlSpanItemDate.append(htmlSpanStart);
                            if ((evento.data_inicio_string.dia !== evento.data_termino_string.dia) || (evento.data_inicio_string.mes !== evento.data_termino_string.mes)) {
                                var htmlSpan = $('<span></span>');
                                htmlSpan.text('a');
                                var htmlSpanEnd = $('<span></span>');
                                htmlSpanEnd.attr({'class': 'end'});
                                htmlSpanEnd.text(evento.data_termino_string.dia + '/' + evento.data_termino_string.mes);
                                htmlSpanItemDate.append(htmlSpan);
                                htmlSpanItemDate.append(htmlSpanEnd)
                            }
                            htmlLiPortletItem.append(htmlSpanItemDate);
                            var htmlDivItemContent = $('<div></div>');
                            htmlDivItemContent.attr({'class': 'item-content'});
                            var htmlH5 = $('<h4></h4>');
                            htmlH5.text(evento.titulo);
                            htmlDivItemContent.append(htmlH5);
                            var htmlPItemLocation = $('<p></p>');
                            htmlPItemLocation.attr({'class': 'item-location'});
                            var htmlStrong = $('<strong></strong>');
                            htmlStrong.text(evento.local);
                            htmlPItemLocation.append(htmlStrong);
                            var htmlPUrl = $('<p></p>');
                            htmlPUrl.attr({'class': 'url'});
                            var htmlAUrl = $('<a></a>');
                            htmlAUrl.text(evento.url);
                            htmlAUrl.attr({href: evento.url,'class': 'noBorder'});
                            htmlPUrl.html(htmlAUrl);
                            htmlDivItemContent.append(htmlPItemLocation);
                            htmlDivItemContent.append(htmlPUrl);
                            var htmlDivContentText = $('<div></div>');
                            htmlDivContentText.attr({'class': 'content-text no-display'});
                            var htmlP = $('<p></p>');
                            htmlP.text(evento.descricao);
                            htmlSpan = $('<span></span>');
                            htmlSpan.html(evento.texto);
                            htmlDivContentText.append(htmlP);
                            htmlDivContentText.append(htmlSpan);
                            htmlDivItemContent.append(htmlDivContentText);
                            htmlLiPortletItem.append(htmlDivItemContent);
                            var htmlAItemInfo = $('<a></a>');
                            if (evento.texto === '') {
                                htmlAItemInfo = $('<span></span>')
                            }
                            htmlAItemInfo.attr({'class': 'noBorder item-info item-info-more txt-rp',href: evento.url});
                            htmlLiPortletItem.append(htmlAItemInfo);
                            htmlUlPortletItems.append(htmlLiPortletItem)
                        });
                        portletAgenda.append(htmlUlPortletItems);
                        $('.portlet-item:odd').addClass('even');
                        $('.portlet-item:even').addClass('odd')
                    } else {
                        htmlH4PortletTitle = $('<h3></h3>');
                        htmlH4PortletTitle.attr({'class': 'portlet-title'});
                        htmlH4PortletTitle.text('Não há evento agendado para o mês selecionado.');
                        portletAgenda.html(htmlH4PortletTitle)
                    }
                }
            };
            var parseDataHash = function(hash) {
                var valores = hash.match(/#(\d{2})\/(\d{4})/);
                if (valores && valores.length > 2) {
                    return {mes: valores[1],ano: valores[2]}
                }
            };
            var getEventos = function(hash) {
                var data = parseDataHash(hash);
                if (!data) {
                    data = {mes: 'now',ano: 'now'}
                }
                $.get('./agenda.json', data, function(json) {
                    constroiAgenda(json)
                }, 'json')
            };
            var hash = window.location.hash;
            if (hash) {
                $('.panelet_filtro_agenda .mes.ativo').removeClass('ativo');
                $('.panelet_filtro_agenda .mes[href$=' + hash + ']').addClass('ativo')
            }
            getEventos(hash);
            $('.lista-wrapper').jcarousel({vertical: false});
            var target = $('.lista-meses .ativo').closest('li').index();
            if (target > 0) {
                $('.lista-wrapper').jcarousel('scroll', --target)
            }
            $('.panelet_filtro_agenda .avancar').click(function(e) {
                e.preventDefault();
                $('.lista-wrapper').jcarousel('scroll', '+=1')
            });
            $('.panelet_filtro_agenda .voltar').click(function(e) {
                e.preventDefault();
                $('.lista-wrapper').jcarousel('scroll', '-=1')
            });
            $('.panelet_filtro_agenda .mes').click(function() {
                $('.lista-wrapper .mes.ativo').removeClass('ativo');
                $(this).addClass('ativo');
                var hash = $(this).attr('href');
                getEventos(hash)
            })
        }
        if ($('.portlet_agenda').length > 0) {
            $('.lista-agenda a.item-info').live('click', function(e) {
                e.preventDefault();
                var itemli, top;
                itemli = $(this).closest('li');
                $(this).toggleClass(function() {
                    if ($(itemli).children('.item-content').children().is('.no-display')) {
                        $('.lista-agenda .item-info-less').each(function() {
                            $(this).toggleClass('item-info-less item-info-more')
                        });
                        $('.portlet-item .display').toggleClass('display no-display');
                        $(itemli).find('.no-display').toggleClass('no-display display')
                    } else {
                        $(itemli).find('.display').toggleClass('display no-display')
                    }
                    return 'item-info-less'
                });
                top = $(this).closest('li').offset().top + 'px';
                $('body, html').animate({scrollTop: top})
            })
        }
    },printPdf: function() {
        if ($('.generate-pdf').length > 0) {
            $('.generate-pdf a').click(function(e) {
                e.preventDefault();
                $.get(window.location.href + '/@@aws-content-pdfbook', 
                function(data) {
                    $('body').append($(data).find('[id=zc.page.browser_form]'));
                    $('[id=form.actions.label_download_as_pdf]').click()
                })
            })
        }
    },generateSitemap: function() {
        if ($('.template-sitemap').length > 0) {
            $('.navTreeLevel0 > .navTreeItem > div').each(function() {
                var texto = $(this).text();
                $(this).replaceWith(texto)
            })
        }
    },blogPosts: function() {
        $('.documentByLine span').each(function() {
            $(this).prependTo($(this).closest('.documentByLine'))
        });
        if ($('#commenting').length > 0) {
            $(window).bind('load', function() {
                $('.reply-to-comment-button').unbind('click').click(function(e) {
                    var comment_div = $(this).parents().filter(".comment");
                    if ($('.reply', comment_div).length == 0) {
                        $.createReplyForm(comment_div);
                        $.clearForm(comment_div)
                    }
                })
            })
        }
    },generateGlossary: function() {
        $('.highlightedGlossaryTerm').unbind('mouseover').bind('mouseover', function() {
            var top = 15, left = 15;
            $('#glossary-definition-popup').css({top: top,left: left});
            var div = $('<div class="inside"></div>');
            var html = $('#glossary-definition-popup').html();
            div.html(html);
            $('#glossary-definition-popup').html(div)
        })
    },generateFilters: function() {
        function getDadosFiltro(filtro, callback) {
            $.ajax({url: filtro.path + '/@@filtro',type: 'GET',contentType: 'application/json; charset=utf-8',data: filtro,dataType: 'json',success: callback})
        }
        var barraFiltro, nome, mes, ano, filtro = {};
        if ($('#content-news').length > 0 && $('#barra-de-filtro-especifico').length > 0) {
            barraFiltro = $('#barra-de-filtro-especifico');
            filtro.formato = barraFiltro.find('.formato_filtro').val();
            filtro.path = barraFiltro.find('.pasta_associada').val();
            $('#barra-de-filtro-especifico').submit(function(e) {
                e.preventDefault();
                nome = barraFiltro.find('#nome_filtro').val();
                mes = barraFiltro.find('#mes_filtro').val();
                ano = barraFiltro.find('#ano_filtro').val();
                if (nome === 'O que você procura?') {
                    nome = ''
                }
                filtro.nome = nome;
                filtro.mes = mes;
                filtro.ano = ano;
                $("#carrossel-news").html(null);
                $('.panelet_news_item_highlight').parent().remove();
                var count = 0;
                filtro.inicio = count;
                filtro.fim = 4 + count;
                getDadosFiltro(filtro, function(response) {
                    var iCount = count;
                    $.each(response, function() {
                        iCount++;
                        var htmlElt = formatTemplateMultimidia(this, iCount);
                        $("#carrossel-news").append(htmlElt)
                    })
                })
            });
            $('.panelet_barra_mais_conteudo').bind('click', function(e) {
                e.preventDefault();
                if ($('.panelet_barra_mais_conteudo').hasClass('disabled')) {
                    return 0
                }
                $('.panelet_barra_mais_conteudo').addClass('disabled');
                $('#carrossel-news>li.element-invisible').removeClass('element-invisible');
                var count = $('#carrossel-news').children().length;
                var max = parseInt($('#max').val());
                filtro.inicio = count;
                filtro.fim = count + max;
                filtro.sort_on = 'effective';
                getDadosFiltro(filtro, function(response) {
                    var iCount = count;
                    $.each(response, function() {
                        iCount++;
                        var htmlElt = formatTemplateMultimidia(this, iCount);
                        htmlElt = $(htmlElt).addClass('element-invisible');
                        $("#carrossel-news li:last-child").after(htmlElt)
                    });
                    if (iCount === count) {
                        $('.panelet_barra_mais_conteudo span').text('Sem mais resultados')
                    }
                    $('.panelet_barra_mais_conteudo').removeClass('disabled')
                })
            })
        } else if (($('.multimidia').length > 0 || $('.programas').length > 0) && $('#barra-de-filtro').length > 0) {
            barraFiltro = $('#barra-de-filtro');
            filtro.formato = barraFiltro.find('.formato_filtro').val();
            filtro.path = barraFiltro.find('.pasta_associada').val();
            var text_barra_busca = $('.panelet_barra_mais_conteudo span').text();
            $('#barra-de-filtro').submit(function(e) {
                e.preventDefault();
                nome = barraFiltro.find('#nome_filtro').val();
                mes = barraFiltro.find('#mes_filtro').val();
                ano = barraFiltro.find('#ano_filtro').val();
                if (nome === 'O que você procura?') {
                    nome = ''
                }
                filtro.nome = nome;
                filtro.mes = mes;
                filtro.ano = ano;
                if ($('.programas').length > 0) {
                    $(".resultados_programas").html(null)
                } else {
                    $(".cpttableless.grid-470px").html(null)
                }
                var count = 0;
                filtro.inicio = count;
                filtro.fim = 4 + count;
                getDadosFiltro(filtro, function(response) {
                    var iCount = count;
                    $.each(response, function() {
                        iCount++;
                        var htmlElt = formatTemplateMultimidia(this, iCount);
                        if ($('.programas').length > 0) {
                            $(".resultados_programas").append(htmlElt)
                        } else {
                            $(".cpttableless.grid-470px").append(htmlElt)
                        }
                    })
                });
                $('.panelet_barra_mais_conteudo span').text(text_barra_busca)
            });
            $('.panelet_barra_mais_conteudo').bind('click', function(e) {
                e.preventDefault();
                var count = $('.resultados_programas').children().length;
                filtro.inicio = count;
                filtro.fim = 4 + count;
                getDadosFiltro(filtro, function(response) {
                    var iCount = count;
                    $.each(response, function() {
                        iCount++;
                        var htmlElt = formatTemplateMultimidia(this, iCount);
                        $(".resultados_programas").append(htmlElt)
                    });
                    if (iCount === count) {
                        $('.panelet_barra_mais_conteudo span').text('Sem mais resultados')
                    }
                })
            })
        } else {
            $('.panelet_barra_mais_conteudo').bind('click', function(e) {
                e.preventDefault();
                var count = $('.resultado_busca .list-folder').children().length;
                $.ajax({url: './@@filtro',type: 'GET',contentType: 'application/json; charset=utf-8',data: {'inicio': count,'fim': 4 + count},dataType: 'json',success: function(response) {
                        var iCount = count;
                        $.each(response, function() {
                            iCount++;
                            var htmlElt = formatTemplateMultimidia(this, iCount);
                            $(".resultado_busca .list-folder li:last-child").after(htmlElt)
                        });
                        if (iCount === count) {
                            $('.panelet_barra_mais_conteudo span').text('Sem mais resultados')
                        }
                    }})
            })
        }
    },generateTampleteMultimedia: function() {
        formatTemplateMultimidia = function(obj, iCount) {
            var formato = obj.formato, nome = obj.nome, mes = obj.mes, dia = obj.dia, path = obj.path, videoid = obj.video_id, descricao = (((obj.imgalt !== undefined) && (obj.imgalt !== '')) ? "&nbsp;" : obj.descricao), itemClass = (((iCount % 4) === 0) ? 'item-folder item-folder-break' : 'item-folder'), imagesrc = obj.imgsrc, imagealt = (((obj.imgalt !== undefined) && (obj.imgalt !== '')) ? obj.imgalt : (((obj.descricao !== undefined) && (obj.descricao !== '')) ? obj.descricao : obj.nome)), htmlElt;
            switch (formato) {
                case 'Image':
                    htmlElt = '<li class="' + itemClass + '">' + '<a href="' + path + '" class="item-link noBorder">' + '<img src="' + path + '/image_listmultimidia" alt="' + imagealt + '" class="item-link noBorder">' + '<span class="item-link-title">' + nome + '</span>' + '<span class="item-link-description">' + descricao + '</span>' + '</a>' + '</li>';
                    break;
                case 'Google Video':
                    htmlElt = '<li class="' + itemClass + '">' + '<a href="' + path + '" class="item-link noBorder">' + '<img width="150" src="' + path + '/image_thumb" alt="' + imagealt + '" class="thumb_video">' + '<span class="item-link-title">' + nome + '</span>' + '<span class="item-link-description">' + descricao + '</span>' + '<span class="item-link-itemvideoid">' + videoid + '</span>' + '</a>' + '</li>';
                    break;
                case 'Audio':
                    htmlElt = '<li class="' + itemClass + '">' + '<a href="' + path + '/at_download/arquivo" class="item-link noBorder">' + '<span class="icon-audio"></span>' + '<span class="item-link-title">' + nome + '</span>' + '<span class="item-link-description">' + descricao + '</span>' + '</a>' + '</li>';
                    break;
                case 'News Item':
                    htmlElt = '<li>' + '<span class="date">' + dia + ' / ' + mes + '</span>' + '<span class="icon info"></span>' + '<a href="' + path + '" class="link noBorder">' + nome + '</a>' + '</li>';
                    break;
                case 'Document':
                    htmlElt = '<div class="programa">';
                    if (imagesrc !== '') {
                        htmlElt += '<a class="noBorder" href="' + path + '">';
                        htmlElt += '<img width="190px" src="' + imagesrc + '" alt="' + imagealt + '">';
                        htmlElt += '</a>'
                    }
                    htmlElt += '<h3>';
                    htmlElt += '<a class="noBorder titulo" href="' + path + '">' + nome + '</a>';
                    htmlElt += '</h3>';
                    htmlElt += '<p>';
                    htmlElt += '<a class="noBorder descricao" href="' + path + '">' + descricao + '</a>';
                    htmlElt += '</p>';
                    htmlElt += '</div>';
                    break
            }
            return htmlElt
        };
        if ($('#player_video').length > 0) {
            $('#player_video').attr('allowfullscreen', true)
        }
    },sectionZmi: function() {
        if ($('#archetypes-fieldname-description label.formQuestion').length > 0) {
            $('#archetypes-fieldname-description label.formQuestion').html('Descrição')
        }
    },isMobile: function() {
        var responsiveResize, root;
        root = typeof exports !== "undefined" && exports !== null ? exports : this;
        root.ResponsiveResize = function() {
            var _Singleton, _base;
            _Singleton = (function() {
                function _Singleton() {
                }
                _Singleton.prototype.perspectiva_anterior = '';
                _Singleton.prototype.scrollbar = false;
                _Singleton.prototype.resize = function() {
                    var perspectiva_atual;
                    if (Modernizr.mq('screen and (max-width: 320px)') || Modernizr.mq('screen and (min-width: 321px) and (max-width: 480px)')) {
                        perspectiva_atual = 'mobile'
                    } else {
                        perspectiva_atual = 'desktop'
                    }
                    if (this.perspectiva_anterior !== perspectiva_atual) {
                        this.perspectiva_anterior = perspectiva_atual;
                        var k, v;
                        for (k in this) {
                            v = this[k];
                            if (typeof v === 'function' && k.slice(0, 8) === 'atualiza') {
                                this[k](perspectiva_atual)
                            }
                        }
                    }
                };
                _Singleton.prototype.atualiza_menu = function(perspectiva) {
                    if (perspectiva === 'mobile') {
                        var target;
                        $('.nav-mobile a').click(function(e) {
                            e.preventDefault();
                            target = $(this).attr('href');
                            $(':not(' + target + ')').removeClass('active');
                            $(target).toggleClass('active');
                            $('#portal-header').height(220 + $(target).height());
                            $('.nav-mobile a').removeClass('active');
                            $(this).addClass('active');
                            if ($('.navmain').hasClass('active') == false) {
                                $('#portal-header').height(173);
                                $('.nav-mobile a').removeClass('active')
                            }
                        });
                        if ($('#parent-fieldname-title').length > 0) {
                            $('.nav-subitem-mobile').insertAfter('#parent-fieldname-title')
                        }
                    } else {
                        $('.nav-mobile a').unbind('click');
                        $('.nav-subitem-mobile').appendTo('#menu-mobile')
                    }
                };
                _Singleton.prototype.atualiza_social_like = function(perspectiva) {
                    if ($("#viewlet-social-like").length > 0) {
                        if (perspectiva === 'desktop') {
                            $('#viewlet-social-like').insertAfter('#viewlet-below-content-title>.documentActions');
                            $('#compartilhar').hide()
                        } else {
                            $('#viewlet-social-like').insertAfter('#compartilhar>.title');
                            $('#compartilhar').show()
                        }
                    }
                };
                _Singleton.prototype.atualiza_social_panels = function(perspectiva) {
                    if (perspectiva === 'desktop' && $("#social-fb").length > 0 && $("#social-fb iframe").length == 0) {
                        $('#content ul.tabs').css('display', 'block');
                        $('.panes').css('display', 'block');
                        if ($.browser.msie) {
                            $('#social-fb').html('<iframe title="Componente da rede social Facebook" frameborder="0" scrolling="no" style="border: none; width: 234px; height: 272px; position: relative;" allowtransparency="true" src="http://www.facebook.com/connect/connect.php?id=165500080198037&amp;connections=8&amp;css=http%3A%2F%2Fclientes.avadora.com.br%2Fsdh%2Fsdhface.css?2&amp;locale=pt_BR"></iframe>')
                        } else {
                            $('#social-fb').html('<iframe title="Componente da rede social Facebook" frameborder="0" scrolling="no" style="border: none; width: 234px; height: 272px; position: relative;" src="http://www.facebook.com/connect/connect.php?id=165500080198037&amp;connections=8&amp;css=http%3A%2F%2Fclientes.avadora.com.br%2Fsdh%2Fsdhface.css?2&amp;locale=pt_BR"></iframe>')
                        }
                        $.ajaxSetup({cache: true});
                        $.getScript('./portal_javascripts/brasil_sdh_tema/tweets.js', function() {
                            $('#social-tt').html('<a class="twitter-timeline" href="https://twitter.com/DHumanosBrasil" data-widget-id="344798222834876417">Tweets de @DHumanosBrasil</a>')
                        })
                    }
                };
                _Singleton.prototype.atualiza_carrossel_slider = function(perspectiva) {
                    if ((perspectiva === 'desktop') && ($("#scrollbar").length > 0) && (!this.scrollbar)) {
                        $.getScript('./portal_javascripts/jquery.tinyscrollbar.min.js', function() {
                            $('#scrollbar').css({'width': '711px'});
                            $('#scrollbar .viewport').css({'width': '711px','height': '210px','position': 'relative'});
                            $('#scrollbar .scrollbar').css({'display': 'block'});
                            $('#scrollbar .overview, #content #scrollbar #carrossel-itens').css({'position': 'absolute'});
                            $('#content #scrollbar #carrossel-itens li').css({'width': '240px','height': '208px','margin': 0});
                            $('#content #scrollbar #carrossel-itens li:last-child').css({'width': '230px'});
                            $('#content #scrollbar #carrossel-itens .title').css({'width': '230px','margin-top': '10px','clear': 'left'});
                            $('#content #scrollbar #carrossel-itens .description').css({'width': '230px','margin-top': '3px','float': 'none'});
                            var qtdItensCarousel = $('#carrossel-itens li').length;
                            var larguraCarousel = $('#carrossel-itens li').width() * qtdItensCarousel;
                            $('#carrossel-itens, #scrollbar .overview').width(larguraCarousel);
                            $('#scrollbar').tinyscrollbar({axis: 'x',sizethumb: 233});
                            this.scrollbar = true
                        })
                    }
                };
                _Singleton.prototype.atualiza_player_imagem = function(perspectiva) {
                    if ($('.lupa').length > 0) {
                        if (perspectiva === 'desktop') {
                            $('.lupa').click(function(e) {
                                e.preventDefault();
                                var thisObj = $(this);
                                var imageUrl = thisObj.attr('href');
                                $.getJSON(imageUrl + '/jsondata', function(data) {
                                    var imageTitle = "", imageDescription = "", imageDate = "", imageRights = "", imageDownload = "", imageTag = "", linkpermanente = '<div class="imageLink-wrap">' + '<ul class="imageLinks boxlink">' + '<li class="imagePermalink">' + '<a href="#">' + 'Link Permanente' + '</a>' + '<div class="imagePermaLink inputbox">' + '<input type="text" readonly="readonly" name="permalink" value="' + imageUrl + '" class="blurrable inputPermalink" />' + '</div>' + '</li>' + '</ul>' + '</div>', btFechar = '<a class="fechaModal" href="#">Fechar</a>';
                                    if (data.Title !== "") {
                                        imageTitle = "<h1>" + data.Title + "</h1>";
                                        if (data.Title === "image") {
                                            imageTitle = "<h1>" + $('h1.documentFirstHeading').html() + "</h1>"
                                        }
                                    }
                                    if (data.Date !== "") {
                                        imageDate = '<span id="modal-date">Publicação: ' + data.Date + "</span>"
                                    }
                                    if (data.Rights !== "") {
                                        imageRights = '<span id="modal-creditos">' + data.Rights + "</span>"
                                    }
                                    if (data.Description !== "") {
                                        imageDescription = '<div id="modal-legenda">' + data.Description + '</div>';
                                        imageTag = '<img id="" src="' + imageUrl + '" alt="' + data.Description + '" width="400" />'
                                    } else {
                                        imageTag = '<img id="" src="' + imageUrl + '" alt="' + data.Title + '" width="400" />'
                                    }
                                    if (data.objsize !== "") {
                                        imageDownload = '<div class="download">' + '<div class="downloadIcone" />' + '<a href="' + imageUrl + '/download">' + 'Baixar a foto' + '</a>' + '<br />' + data.objsize + '<div class="visualClear">' + '<!-- -->' + '</div>' + '</div>' + '</div>'
                                    }
                                    $('body').append('<div id="modal-mask">' + '<div id="image-info-wrap">' + '<div id="img-border">' + '<div id="img-bg-container">' + imageTitle + imageDate + imageRights + btFechar + imageTag + imageDescription + linkpermanente + imageDownload + '</div>' + '</div>' + '</div>' + '</div>');
                                    $("iframe, object").css({'visibility': 'hidden'});
                                    var imgWrap = $('#image-info-wrap');
                                    var imgObj = $('#modal-mask img');
                                    var dynamicWrap = {'position': 'absolute','width': '400px','height': imgObj.height() + 'px','left': '50%','margin-left': '-200px','z-index': '9999'};
                                    var dynamicMask = {'position': 'absolute','z-index': '9998','top': 0,'left': 0,'width': $(window).width() + 'px','height': ($(document).height() - 130) + 'px','overflow': 'hidden'};
                                    $('#modal-mask').css(dynamicMask);
                                    imgWrap.css(dynamicWrap);
                                    var y_fixo = $("#image-info-wrap").offset().top;
                                    $("html, body").animate({scrollTop: 0});
                                    $("#image-info-wrap").animate({top: 60}, {duration: 500,queue: false});
                                    $(document).keyup(function(e) {
                                        if (e.keyCode == 27) {
                                            $('#modal-mask').remove();
                                            $('iframe, object').css({'visibility': 'inherit'})
                                        }
                                    });
                                    $('.fechaModal').click(function(e) {
                                        e.preventDefault();
                                        $('#modal-mask').remove();
                                        $('iframe, object').css({'visibility': 'inherit'})
                                    });
                                    $(".inputbox").hide();
                                    $("#modal-mask li.imagePermalink a").toggle(function(e) {
                                        e.preventDefault();
                                        $(this).parent().find("div.imageLink-wrap, .inputbox").show()
                                    }, function(e) {
                                        e.preventDefault();
                                        $(this).parent().find("div.imageLink-wrap, .inputbox").hide()
                                    })
                                })
                            })
                        } else {
                            $('.lupa').unbind('click')
                        }
                    }
                };
                _Singleton.prototype.atualiza_player_audio = function(perspectiva) {
                    if ($(".multimidia-audios-player").length > 0) {
                        if (perspectiva === 'desktop') {
                            var insere_flash = function(titulo, link, descricao) {
                                var title, file, description, object, top;
                                title = titulo;
                                file = link;
                                description = descricao;
                                $('.multimidia-audios-player .head-title').text(title);
                                $('.multimidia-audios-player .description').text(description);
                                object = '<object align="middle" width="215" height="40" id="player_audio">';
                                object += '<param value="player_215_40.swf?caminho=';
                                object += file;
                                object += '/at_download/arquivo" name="movie" />';
                                object += '<param value="transparent" name="wmode" />';
                                object += '<embed width="215" height="40" ';
                                object += 'wmode="transparent" pluginspage="http://www.adobe.com/go/getflashplayer" ';
                                object += 'type="application/x-shockwave-flash" allowfullscreen="false" ';
                                object += 'allowscriptaccess="sameDomain" name="player_audio" ';
                                object += 'bgcolor="#ffffff" quality="high" ';
                                object += 'src="player_215_40.swf?caminho=';
                                object += file;
                                object += '/at_download/arquivo" />';
                                object += '</object>';
                                $('.multimidia-audios-player .portlet-audio-player').html(object);
                                top = $('.multimidia-audios-player').offset().top + 'px';
                                $('body, html').animate({scrollTop: top})
                            }
                            $('.list-folder .item-folder a.item-link').click(function(e) {
                                e.preventDefault();
                                insere_flash($(this).find('.item-link-title').text(), $(this).attr('href'), $(this).find('.item-link-description').text())
                            });
                            insere_flash($('.multimidia-audios-player .head-title').text(), $('.multimidia-audios-player .portlet-audio-player a').attr('href'), $('.multimidia-audios-player .description').text())
                        } else {
                            $('.list-folder .item-folder a.item-link').unbind('click')
                        }
                    }
                };
                return _Singleton
            })();
            if ((_base = root.ResponsiveResize).instance == null) {
                _base.instance = new _Singleton()
            }
            return root.ResponsiveResize.instance
        };
        var resize = function() {
            responsiveResize = new root.ResponsiveResize();
            responsiveResize.resize()
        }
        $(window).resize(function() {
            resize()
        });
        resize()
    }};
$(function() {
    "use strict";
    SDH.init()
});