/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(window, document, $) {
  'use strict';

  var $doc = $(document);

  // Site
  // ====
  $.site = $.site || {};

  $.extend($.site, {
    _queue: {
      prepare: [],
      run: [],
      complete: []
    },

    run: function() {
      var self = this;

      this.dequeue('prepare', function() {
        self.trigger('before.run', self);
      });

      this.dequeue('run', function() {
        self.dequeue('complete', function() {
          self.trigger('after.run', self);
        });
      });
    },

    dequeue: function(name, done) {
      var self = this,
        queue = this.getQueue(name),
        fn = queue.shift(),
        next = function() {
          self.dequeue(name, done);
        };

      if (fn) {
        fn.call(this, next);
      } else if ($.isFunction(done)) {
        done.call(this);
      }
    },

    getQueue: function(name) {
      if (!$.isArray(this._queue[name])) {
        this._queue[name] = [];
      }

      return this._queue[name];
    },

    extend: function(obj) {
      $.each(this._queue, function(name, queue) {
        if ($.isFunction(obj[name])) {
          queue.push(obj[name]);

          delete obj[name];
        }
      });

      $.extend(this, obj);

      return this;
    },

    trigger: function(name, data, $el) {
      if (typeof name === 'undefined') return;
      if (typeof $el === 'undefined') $el = $doc;

      $el.trigger(name + '.site', data);
    },

    throttle: function(func, wait) {
      var _now = Date.now || function() {
        return new Date().getTime();
      };
      var context, args, result;
      var timeout = null;
      var previous = 0;

      var later = function() {
        previous = _now();
        timeout = null;
        result = func.apply(context, args);
        context = args = null;
      };

      return function() {
        var now = _now();
        var remaining = wait - (now - previous);
        context = this;
        args = arguments;
        if (remaining <= 0) {
          clearTimeout(timeout);
          timeout = null;
          previous = now;
          result = func.apply(context, args);
          context = args = null;
        } else if (!timeout) {
          timeout = setTimeout(later, remaining);
        }
        return result;
      };
    },

    resize: function() {
      if (document.createEvent) {
        var ev = document.createEvent('Event');
        ev.initEvent('resize', true, true);
        window.dispatchEvent(ev);
      } else {
        element = document.documentElement;
        var event = document.createEventObject();
        element.fireEvent("onresize", event);
      }
    }
  });

  // Configs
  // =======
  $.configs = $.configs || {};

  $.extend($.configs, {
    data: {},
    get: function(name) {
      var callback = function(data, name) {
        return data[name];
      }

      var data = this.data;

      for (var i = 0; i < arguments.length; i++) {
        name = arguments[i];

        data = callback(data, name);
      }

      return data;
    },

    set: function(name, value) {
      this.data[name] = value;
    },

    extend: function(name, options) {
      var value = this.get(name);
      return $.extend(true, value, options);
    }
  });

  // Colors
  // ======
  $.colors = function(name, level) {
    if (name === 'primary') {
      name = $.configs.get('site', 'primaryColor');
      if (!name) {
        name = 'red';
      }
    }

    if (typeof $.configs.colors === 'undefined') {
      return null;
    }

    if (typeof $.configs.colors[name] !== 'undefined') {
      if (level && typeof $.configs.colors[name][level] !== 'undefined') {
        return $.configs.colors[name][level];
      }

      if (typeof level === 'undefined') {
        return $.configs.colors[name];
      }
    }

    return null;
  };

  // Components
  // ==========
  $.components = $.components || {};

  $.extend($.components, {
    _components: {},

    register: function(name, obj) {
      this._components[name] = obj;
    },

    init: function(name, context, args) {
      var self = this;

      if (typeof name === 'undefined') {
        $.each(this._components, function(name) {
          self.init(name);
        });
      } else {
        context = context || document;
        args = args || [];

        var obj = this.get(name);

        if (obj) {
          switch (obj.mode) {
            case 'default':
              return this._initDefault(name, context);
            case 'init':
              return this._initComponent(name, obj, context, args);
            case 'api':
              return this._initApi(name, obj, args);
            default:
              this._initApi(name, obj, context, args);
              this._initComponent(name, obj, context, args);
              return;
          }
        }
      }
    },

    /* init alternative, but only or init mode */
    call: function(name, context) {
      var args = Array.prototype.slice.call(arguments, 2);
      var obj = this.get(name);

      context = context || document;

      return this._initComponent(name, obj, context, args);
    },

    _initDefault: function(name, context) {
      if (!$.fn[name]) return;

      var defaults = this.getDefaults(name);

      $('[data-plugin=' + name + ']', context).each(function() {
        var $this = $(this),
          options = $.extend(true, {}, defaults, $this.data());

        $this[name](options);
      });
    },


    _initComponent: function(name, obj, context, args) {
      if ($.isFunction(obj.init)) {
        obj.init.apply(obj, [context].concat(args));
      }
    },

    _initApi: function(name, obj, args) {
      if (typeof obj.apiCalled === 'undefined' && $.isFunction(obj.api)) {
        obj.api.apply(obj, args);

        obj.apiCalled = true;
      }
    },


    getDefaults: function(name) {
      var component = this.get(name);

      if (component && typeof component.defaults !== "undefined") {
        return component.defaults;
      } else {
        return {};
      }
    },

    get: function(name, property) {
      if (typeof this._components[name] !== "undefined") {
        if (typeof property !== "undefined") {
          return this._components[name][property];
        } else {
          return this._components[name];
        }
      } else {
        console.warn('component:' + component + ' script is not loaded.');

        return undefined;
      }
    }
  });

})(window, document, jQuery);

/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(window, document, $) {
  'use strict';

  var $body = $(document.body);

  // configs setup
  // =============
  $.configs.set('site', {
    fontFamily: "Noto Sans, sans-serif",
    primaryColor: "indigo",
    assets: "../assets"
  });

  window.Site = $.site.extend({
    run: function(next) {
      // polyfill
      this.polyfillIEWidth();

      // Menubar setup
      // =============
      if (typeof $.site.menu !== 'undefined') {
        $.site.menu.init();
      }

      if (typeof $.site.menubar !== 'undefined') {
        $(".site-menubar").on('changing.site.menubar', function() {
          $('[data-toggle="menubar"]').each(function() {
            var $this = $(this);
            var $hamburger = $(this).find('.hamburger');

            function toggle($el) {
              $el.toggleClass('hided', !$.site.menubar.opened);
              $el.toggleClass('unfolded', !$.site.menubar.folded);
            }
            if ($hamburger.length > 0) {
              toggle($hamburger);
            } else {
              toggle($this);
            }
          });

          $.site.menu.refresh();
        });

        $(document).on('click', '[data-toggle="collapse"]', function(e) {
          var $trigger = $(e.target);
          if (!$trigger.is('[data-toggle="collapse"]')) {
            $trigger = $trigger.parents('[data-toggle="collapse"]');
          }
          var href;
          var target = $trigger.attr('data-target') || (href = $trigger.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '');
          var $target = $(target);
          if ($target.hasClass('navbar-search-overlap')) {
            $target.find('input').focus();

            e.preventDefault();
          } else if ($target.attr('id') === 'site-navbar-collapse') {
            var isOpen = !$trigger.hasClass('collapsed');
            $body.addClass('site-navbar-collapsing');

            $body.toggleClass('site-navbar-collapse-show', isOpen);

            setTimeout(function() {
              $body.removeClass('site-navbar-collapsing');
            }, 350);

            if (isOpen) {
              $.site.menubar.scrollable.update();
            }
          }
        });

        $(document).on('click', '[data-toggle="menubar"]', function() {
          $.site.menubar.toggle();

          return false;
        });

        $.site.menubar.init();

        // Breakpoints.on('change', function() {
        //   $.site.menubar.change();
        // });
      }

      // Gridmenu setup
      // ==============
      if (typeof $.site.gridmenu !== 'undefined') {
        $.site.gridmenu.init();
      }

      // Sidebar setup
      // =============
      if (typeof $.site.sidebar !== 'undefined') {
        $.site.sidebar.init();
      }

      // Tooltip setup
      // =============
      $(document).tooltip({
        selector: '[data-tooltip=true]',
        container: 'body'
      });

      $('[data-toggle="tooltip"]').tooltip();
      $('[data-toggle="popover"]').popover();

      // Fullscreen
      // ==========
      if (typeof screenfull !== 'undefined') {
        $(document).on('click', '[data-toggle="fullscreen"]', function() {
          if (screenfull.enabled) {
            screenfull.toggle();
          }

          return false;
        });

        if (screenfull.enabled) {
          document.addEventListener(screenfull.raw.fullscreenchange, function() {
            $('[data-toggle="fullscreen"]').toggleClass('active', screenfull.isFullscreen);
          });
        }
      }

      // Dropdown menu setup
      // ===================
      $body.on('click', '.dropdown-menu-media', function(e) {
        e.stopPropagation();
      });


      // Page Animate setup
      // ==================
      if (typeof $.animsition !== 'undefined') {
        this.loadAnimate(function() {
          $('.animsition').css({
            "animation-duration": '0s'
          });
          next();
        });
      } else {
        next();
      }

      // Mega navbar setup
      // =================
      $(document).on('click', '.navbar-mega .dropdown-menu', function(e) {
        e.stopPropagation();
      });

      $(document).on('show.bs.dropdown', function(e) {
        var $target = $(e.target);
        var $trigger = e.relatedTarget ? $(e.relatedTarget) : $target.children('[data-toggle="dropdown"]');

        var animation = $trigger.data('animation');
        if (animation) {
          var $menu = $target.children('.dropdown-menu');
          $menu.addClass('animation-' + animation);

          $menu.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $menu.removeClass('animation-' + animation);
          });
        }
      });

      $(document).on('shown.bs.dropdown', function(e) {
        var $target = $(e.target);
        var $menu = $target.find('.dropdown-menu-media > .list-group');

        if ($menu.length > 0) {
          var api = $menu.data('asScrollable');
          if (api) {
            api.update();
          } else {
            var defaults = $.components.getDefaults("scrollable");
            $menu.asScrollable(defaults);
          }
        }
      });

      // Page Aside Scrollable
      // =====================

      var pageAsideScroll = $('[data-plugin="pageAsideScroll"]');

      if (pageAsideScroll.length > 0) {
        pageAsideScroll.asScrollable({
          namespace: "scrollable",
          contentSelector: "> [data-role='content']",
          containerSelector: "> [data-role='container']"
        });

        var pageAside = $(".page-aside");
        var scrollable = pageAsideScroll.data('asScrollable');

        if (scrollable) {
          if ($body.is('.page-aside-fixed') || $body.is('.page-aside-scroll')) {
            $(".page-aside").on("transitionend", function() {
              scrollable.update();
            });
          }

          Breakpoints.on('change', function() {
            var current = Breakpoints.current().name;

            if (!$body.is('.page-aside-fixed') && !$body.is('.page-aside-scroll')) {
              if (current === 'xs') {
                scrollable.enable();
                pageAside.on("transitionend", function() {
                  scrollable.update();
                });
              } else {
                pageAside.off("transitionend");
                scrollable.disable();
              }
            }
          });

          $(document).on('click.pageAsideScroll', '.page-aside-switch', function() {
            var isOpen = pageAside.hasClass('open');

            if (isOpen) {
              pageAside.removeClass('open');
            } else {
              scrollable.update();
              pageAside.addClass('open');
            }
          });

          $(document).on('click.pageAsideScroll', '[data-toggle="collapse"]', function(e) {
            var $trigger = $(e.target);
            if (!$trigger.is('[data-toggle="collapse"]')) {
              $trigger = $trigger.parents('[data-toggle="collapse"]');
            }
            var href;
            var target = $trigger.attr('data-target') || (href = $trigger.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '');
            var $target = $(target);

            if ($target.attr('id') === 'site-navbar-collapse') {
              scrollable.update();
            }
          });
        }
      }

      // Page Actions Waves
      // =========================
      if (typeof Waves !== 'undefined') {
        Waves.init();
        Waves.attach('.site-menu-item > a', ['waves-classic']);
        Waves.attach(".site-navbar .navbar-toolbar [data-toggle='menubar']", ["waves-light", "waves-round"]);
        Waves.attach(".page-header-actions .btn:not(.btn-inverse)", ["waves-light", "waves-round"]);
        Waves.attach(".page-header-actions .btn-inverse", ["waves-classic", "waves-round"]);
        Waves.attach('.page > div:not(.page-header) .btn:not(.ladda-button):not(.btn-round):not(.btn-pure):not(.btn-floating):not(.btn-flat)', ['waves-light']);
        Waves.attach('.page > div:not(.page-header) .btn-pure:not(.ladda-button):not(.btn-round):not(.btn-floating):not(.btn-flat):not(.icon)', ['waves-classic']);
      }

      // Init Loaded Components
      // ======================
      $.components.init();

      this.startTour();
    },

    polyfillIEWidth: function() {
      if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style');
        msViewportStyle.appendChild(
          document.createTextNode(
            '@-ms-viewport{width:auto!important}'
          )
        );
        document.querySelector('head').appendChild(msViewportStyle);
      }
    },

    loadAnimate: function(callback) {
      return $.components.call("animsition", document, callback);
    },

    startTour: function(flag) {
      if (typeof this.tour === 'undefined') {
        if (typeof introJs === 'undefined') {
          return;
        }

        var tourOptions = $.configs.get('tour'),
          self = this;
        flag = $('body').css('overflow');
        this.tour = introJs();

        this.tour.onbeforechange(function() {
          $('body').css('overflow', 'hidden');
        });

        this.tour.oncomplete(function() {
          $('body').css('overflow', flag);
        });

        this.tour.onexit(function() {
          $('body').css('overflow', flag);
        });

        this.tour.setOptions(tourOptions);
        $('.site-tour-trigger').on('click', function() {
          self.tour.start();
        });
      }
      // if (window.localStorage && window.localStorage.getItem('startTour') && (flag !== true)) {
      //   return;
      // } else {
      //   this.tour.start();
      //   window.localStorage.setItem('startTour', true);
      // }
    }
  });

})(window, document, jQuery);

/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(window, document, $) {
  'use strict';

  $.site.menu = {
    speed: 250,
    accordion: true, // A setting that changes the collapsible behavior to expandable instead of the default accordion style

    init: function() {
      this.$instance = $('.site-menu');

      if (this.$instance.length === 0) {
        return;
      }

      this.bind();
    },

    bind: function() {
      var self = this;

      this.$instance.on('mouseenter.site.menu', '.site-menu-item', function() {
        if ($.site.menubar.folded === true && $(this).is('.has-sub') && $(this).parent('.site-menu').length > 0) {
          var $sub = $(this).children('.site-menu-sub');
          self.position($(this), $sub);
        }

        $(this).addClass('hover');
      }).on('mouseleave.site.menu', '.site-menu-item', function() {
        if ($.site.menubar.folded === true && $(this).is('.has-sub') && $(this).parent('.site-menu').length > 0) {
          $(this).children('.site-menu-sub').css("max-height", "");
        }

        $(this).removeClass('hover');
      }).on('deactive.site.menu', '.site-menu-item.active', function(e) {
        var $item = $(this);

        $item.removeClass('active');

        e.stopPropagation();
      }).on('active.site.menu', '.site-menu-item', function(e) {
        var $item = $(this);

        $item.addClass('active');

        e.stopPropagation();
      }).on('open.site.menu', '.site-menu-item', function(e) {
        var $item = $(this);

        self.expand($item, function() {
          $item.addClass('open');
        });

        if (self.accordion) {
          $item.siblings('.open').trigger('close.site.menu');
        }

        e.stopPropagation();
      }).on('close.site.menu', '.site-menu-item.open', function(e) {
        var $item = $(this);

        self.collapse($item, function() {
          $item.removeClass('open');
        });

        e.stopPropagation();
      }).on('click.site.menu', '.site-menu-item', function(e) {
        if ($(this).is('.has-sub') && $(e.target).closest('.site-menu-item').is(this)) {
          if ($(this).is('.open')) {
            $(this).trigger('close.site.menu');
          } else {
            $(this).trigger('open.site.menu');
          }
        } else {
          if (!$(this).is('.active')) {
            $(this).siblings('.active').trigger('deactive.site.menu');
            $(this).trigger('active.site.menu');
          }
        }

        e.stopPropagation();
      }).on('scroll.site.menu', '.site-menu-sub', function(e) {
        e.stopPropagation();
      });
    },

    collapse: function($item, callback) {
      var self = this;
      var $sub = $item.children('.site-menu-sub');

      $sub.show().slideUp(this.speed, function() {
        $(this).css('display', '');

        $(this).find('> .site-menu-item').removeClass('is-shown');

        if (callback) {
          callback();
        }

        self.$instance.trigger('collapsed.site.menu');
      });
    },

    expand: function($item, callback) {
      var self = this;
      var $sub = $item.children('.site-menu-sub');
      var $children = $sub.children('.site-menu-item').addClass('is-hidden');

      $sub.hide().slideDown(this.speed, function() {
        $(this).css('display', '');

        if (callback) {
          callback();
        }

        self.$instance.trigger('expanded.site.menu');
      });

      setTimeout(function() {
        $children.addClass('is-shown');
        $children.removeClass('is-hidden');
      }, 0);
    },

    refresh: function() {
      this.$instance.find('.open').filter(':not(.active)').removeClass('open');
    },

    position: function($item, $dropdown) {
      var offsetTop = $item.position().top,
        dropdownHeight = $dropdown.outerHeight(),
        menubarHeight = $.site.menubar.$instance.outerHeight(),
        itemHeight = $item.find("> a").outerHeight();

      $dropdown.removeClass('site-menu-sub-up').css('max-height', "");

      //if (offsetTop + dropdownHeight > menubarHeight) {
      if (offsetTop > menubarHeight / 2) {
        $dropdown.addClass('site-menu-sub-up');

        if ($.site.menubar.foldAlt) {
          offsetTop = offsetTop - itemHeight;
        }
        //if(dropdownHeight > offsetTop + itemHeight) {
        $dropdown.css('max-height', offsetTop + itemHeight);
        //}
      } else {
        if ($.site.menubar.foldAlt) {
          offsetTop = offsetTop + itemHeight;
        }
        $dropdown.removeClass('site-menu-sub-up');
        $dropdown.css('max-height', menubarHeight - offsetTop);
      }
      //}
    }
  };
})(window, document, jQuery);

/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(window, document, $) {
  'use strict';

  var $body = $('body'),
    $html = $('html');

  $.site.menubar = {
    opened: null,
    folded: null,
    disableHover: null,
    $instance: null,

    init: function() {
      $html.removeClass('css-menubar').addClass('js-menubar');

      this.$instance = $(".site-menubar");
      if (this.$instance.length === 0) {
        return;
      }

      var self = this;

      if ($body.hasClass('site-menubar-open')) {
        this.opened = true;
      } else {
        this.opened = false;
      }

      if ($body.hasClass('site-menubar-fold')) {
        this.folded = true;
      } else {
        this.folded = false;
      }

      if ($body.hasClass('site-menubar-disable-hover') || this.folded) {
        this.disableHover = true;
      } else {
        this.disableHover = false;
        this.hover();
      }

      this.$instance.on('changed.site.menubar', function() {
        self.update();
      });

    },

    animate: function(doing, callback) {
      var self = this;
      $body.addClass('site-menubar-changing');

      setTimeout(function() {
        doing.call(self);
        self.$instance.trigger('changing.site.menubar');
      }, 10);

      setTimeout(function() {
        callback.call(self);
        $body.removeClass('site-menubar-changing');

        self.$instance.trigger('changed.site.menubar');
      }, 250);
    },

    reset: function() {
      this.opened = null;
      $body.removeClass('site-menubar-open');
    },

    open: function() {
      if (this.opened !== true) {
        this.animate(function() {
          $body.addClass('site-menubar-open');
          if (this.disableHover) {
            $body.addClass('site-menubar-fixed')
          }
          this.opened = true;

        }, function() {
          this.scrollable.enable();

          if (this.opened !== null) {
            $.site.resize();
          }
        });
      }
    },

    hide: function() {
      if (this.folded) {
        this.scrollable.disable();
      }

      if (this.opened !== false) {
        this.animate(function() {
          $body.removeClass('site-menubar-open site-menubar-fixed');
          this.opened = false;

        }, function() {
          if (this.opened !== null) {
            $.site.resize();
          }
        });
      }
    },

    hover: function() {
      var self = this;
      this.$instance.on('mouseenter', function() {
        if ($body.hasClass('site-menubar-fixed') || $body.hasClass('site-menubar-changing')) {
          return;
        }
        self.open();
      }).on('mouseleave', function() {
        if ($body.hasClass('site-menubar-fixed')) {
          return;
        }
        self.hide();
      });
    },

    toggle: function() {
      var breakpoint = Breakpoints.current();
      var opened = this.opened;

      if (opened === null || opened === false) {
        this.disableHover = true;
        this.open();
      } else {
        this.disableHover = false;
        this.hide();
      }
    },

    update: function() {
      this.scrollable.update();
    },

    scrollable: {
      api: null,
      native: false,
      init: function() {
        // if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        //   this.native = true;
        //   $body.addClass('site-menubar-native');
        //   return;
        // }

        if ($body.is('.site-menubar-native')) {
          this.native = true;
          return;
        }

        this.api = $.site.menubar.$instance.children('.site-menubar-body').asScrollable({
          namespace: 'scrollable',
          skin: 'scrollable-inverse',
          direction: 'vertical',
          contentSelector: '>',
          containerSelector: '>'
        }).data('asScrollable');
      },

      update: function() {
        if (this.api) {
          this.api.update();
        }
      },

      enable: function() {
        if (this.native) {
          return;
        }
        if (!this.api) {
          this.init();
        }
        if (this.api) {
          this.api.enable();
        }
      },

      disable: function() {
        if (this.api) {
          this.api.disable();
        }
      }
    }
  };
})(window, document, jQuery);

/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(window, document, $) {
  'use strict';

  $.site.sidebar = {
    init: function() {
      if (typeof $.slidePanel === 'undefined') return;

      $(document).on('click', '[data-toggle="site-sidebar"]', function() {
        var $this = $(this);

        var direction = 'right';
        if ($('body').hasClass('site-menubar-flipped')) {
          direction = 'left';
        }

        var defaults = $.components.getDefaults("slidePanel");
        var options = $.extend({}, defaults, {
          direction: direction,
          skin: 'site-sidebar',
          dragTolerance: 80,
          template: function(options) {
            return '<div class="' + options.classes.base + ' ' + options.classes.base + '-' + options.direction + '">' +
              '<div class="' + options.classes.content + ' site-sidebar-content"></div>' +
              '<div class="slidePanel-handler"></div>' +
              '</div>';
          },
          afterLoad: function() {
            var self = this;
            this.$panel.find('.tab-pane').asScrollable({
              namespace: 'scrollable',
              contentSelector: "> div",
              containerSelector: "> div"
            });

            $.components.init('switchery', self.$panel);
            $.components.init('navTabsLine', self.$panel);
            $('[data-toggle="tooltip"]').tooltip();

            this.$panel.on('shown.bs.tab', function() {
              self.$panel.find(".tab-pane.active").asScrollable('update');
            });
          },
          beforeShow: function() {
            if (!$this.hasClass('active')) {
              $this.addClass('active');
            }
          },
          afterHide: function() {
            if ($this.hasClass('active')) {
              $this.removeClass('active');
            }
          }
        });

        if ($this.hasClass('active')) {
          $.slidePanel.hide();
        } else {
          var url = $this.data('url');
          if (!url) {
            url = $this.attr('href');
            url = url && url.replace(/.*(?=#[^\s]*$)/, '');
          }

          $.slidePanel.show({
            url: url
          }, options);
        }
      });

      $(document).on('click', '[data-toggle="show-chat"]', function() {
        $('#conversation').addClass('active');
      });


      $(document).on('click', '[data-toggle="close-chat"]', function() {
        $('#conversation').removeClass('active');
      });
    }
  };

})(window, document, jQuery);

/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
$(document).ready(function($) {
  Site.run();

  Waves.attach('.page-content .btn-floating', ['waves-light']);
});
