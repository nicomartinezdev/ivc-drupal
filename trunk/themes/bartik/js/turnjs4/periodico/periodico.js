function addPage(page, book) {
	var id, pages = book.turn('pages');
	if (!book.turn('hasPage', page)) {
		var element = $('<div />',
			{'class': 'own-size',
				css: {width: 460, height: 582}
			}).
			html('<div class="loader"></div>');
	}
}

function zoomHandle(e) {
	if ($('.sj-book').data().zoomIn) {
		zoomOut();		
	} else {
		zoomThis(e);
	}
}

function zoomThis(e) {
	var pic = $(".sj-book .page-wrapper:visible img").filter(":first");
	var	position, translate,
		transitionEnd = $.cssTransitionEnd(),
		zCenterX = $('#book-zoom').width()/2,
		zCenterY = $('#book-zoom').height()/2,
		bookPos = $('#book-zoom').offset(),
		picPos = {
			left: pic.offset().left - bookPos.left,
			top: pic.offset().top - bookPos.top
		},
		zoomStartPositionOffsetTop = $("#overlay-content").width() - $(document).scrollLeft() <= 960 ? 500 : 300,
		zoomStartPositionOffsetLeft = $("#overlay-content").width() - $(document).scrollLeft() <= 960 ? 50 : 0,
		completeTransition = function() {
			var bookData = $(".sj-book").data();
			var bookCurrentPage = (bookData.page % 2 !== 0) && (bookData.page > 1) && (bookData.page < bookData.totalPages) ? bookData.page - 1 : bookData.page;   
			$('#book-zoom').unbind(transitionEnd);
			var scrollBarVerticalPosition = $("#overlay-content").width() - $(document).scrollLeft();
			if (scrollBarVerticalPosition > 960) {
				scrollBarVerticalPosition -= 50;
			} else {
				scrollBarVerticalPosition += 145
			}
			var maxWidth = bookCurrentPage > 1 && bookCurrentPage < bookData.totalPages ? 505 : 0;
			if (maxWidth > 0) {
				$("#zoom-horizontal-slider").slider({
					min: 0,
					max: maxWidth,
					value: 0,
					step: 10,
					orientation: "horizontal",
					slide: function(event, ui) {
					    $(".sj-book .page-wrapper[page='"+ bookCurrentPage +"']").css({
					    	left: -ui.value
					    });
					    if (bookCurrentPage > 1 && bookCurrentPage < bookData.totalPages) {
					    	$(".sj-book .page-wrapper[page='"+ parseInt(bookCurrentPage + 1) +"']").css({
						    	left: maxWidth-ui.value
						    });
					    }
					}
				}).show();
			}
			var maxHeight = 300;
			$("#zoom-vertical-slider").slider({
				min: 0,
				max: maxHeight,
				value: maxHeight,
				step: 10,
				orientation: "vertical",
				slide: function(event, ui) {
				    $(".sj-book .page-wrapper[page='"+ bookCurrentPage +"']").css({
				    	top: -(maxHeight-ui.value)
				    });
				    if (bookCurrentPage > 1 && bookCurrentPage < bookData.totalPages) {
				    	$(".sj-book .page-wrapper[page='"+ parseInt(bookCurrentPage + 1) +"']").css({
					    	top: -(maxHeight-ui.value)
					    });
				    }
				}
			}).css({
				left: scrollBarVerticalPosition	
			}).show();
			var pageSelector = ".sj-book .page-wrapper[page!='"+ bookCurrentPage +"']";
			if (maxWidth > 0) {
				pageSelector += "[page!='"+ parseInt(bookCurrentPage + 1) +"']";
			} 
			$(pageSelector).css({
		    	display: "none"
		    });
		};	
		$('.sj-book').data().zoomIn = true;
		$('.sj-book').turn('disable', true);
		$(window).resize(zoomOut);
		var realWidth = 1000,
			realHeight = 1250,
			zoomFactor = realWidth/500,
			picPosition = {
				top:  (picPos.top - zCenterY)*zoomFactor + zCenterY + bookPos.top,
				left: (picPos.left - zCenterX)*zoomFactor + zCenterX + bookPos.left
			};
		position = {
			top: ($(window).height()-realHeight)/2,
			left: ($(window).width()-realWidth)/2
		};
		translate = {
			top: position.top-picPosition.top + zoomStartPositionOffsetTop,
			left: position.left-picPosition.left + zoomStartPositionOffsetLeft
		};
		$('#book-zoom').transform(
			'translate('+translate.left+'px, '+translate.top+'px)' +
			'scale('+zoomFactor+', '+zoomFactor+')');
		if (transitionEnd)
			$('#book-zoom').bind(transitionEnd, completeTransition);
		else
			setTimeout(completeTransition, 1000);			
}

function zoomOut() {
	var transitionEnd = $.cssTransitionEnd(),
		completeTransition = function(e) {
			$('#book-zoom').unbind(transitionEnd);
			$('.sj-book').turn('disable', false);
		};

	$('.sj-book').data().zoomIn = false;
	$(window).unbind('resize', zoomOut);
	var bookData = $('.sj-book').data();
	var bookCurrentPage = (bookData.page % 2 !== 0) && (bookData.page > 1) && (bookData.page < bookData.totalPages) ? bookData.page - 1 : bookData.page;
	var isDouble = bookCurrentPage > 1 && bookCurrentPage < bookData.totalPages;
	var maxWidth = isDouble ? 505 : 0;
	var maxHeight = 300;
	$("#zoom-horizontal-slider").slider("destroy");
	$("#zoom-vertical-slider").slider("destroy");
	$(".sj-book .page-wrapper[page='"+ bookCurrentPage +"']").css({
    	top: 0
    });
    if (isDouble) {
    	$(".sj-book .page-wrapper[page='"+ bookCurrentPage +"']").css({
	    	left: 0
	    });
    	$(".sj-book .page-wrapper[page='"+ parseInt(bookCurrentPage + 1) +"']").css({
	    	top: 0
	    });
	    $(".sj-book .page-wrapper[page='"+ parseInt(bookCurrentPage + 1) +"']").css({
	    	left: maxWidth
	    });
    }
	$('#book-zoom').transform('scale(1, 1)');
	if (transitionEnd)
		$('#book-zoom').bind(transitionEnd, completeTransition);
	else
		setTimeout(completeTransition, 1000);
}

function isChrome() {
	// Chrome's unsolved bug
	// http://code.google.com/p/chromium/issues/detail?id=128488
	return navigator.userAgent.indexOf('Chrome')!=-1;
}