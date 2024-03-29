/*
 * L.Control.BootstrapModal
 * A map control which opens a specified Bootstrap modal. Great for Help buttons or similar popup-modal needs!
 */
L.Control.BootstrapModal = L.Control.extend({
    options: {
        // position         a Leaflet position, e.g. topleft. Optional; defaults to topright
        // modalId          the DOM ID of the Bootstrap modal, without the # sign. Example: **help**, would connect to the modal with **id="help"**
        // tooltip          the tooltip text for the control
        // glyph            the name of a Bootstrap glyphicon, minus the glyphicon- prefix. Example: **flag**  For more info and full list, http://getbootstrap.com/components/#glyphicons
        position: 'topleft',
        modalId: null,
        tooltip: "",
        glyph: 'info-sign'
    },
    initialize: function(options) {
        L.setOptions(this, options);
        if (! options.modalId) throw "L.Control.BootstrapModal: modalId is required";

        // make sure that the stated modal (by DOM ID) is really real and really a Bootstrap modal
        // keep a reference to it for later
        this.modal = $('#' + this.options.modalId );
        if ( ! this.modal.length )                 throw "L.Control.BootstrapModal: could not find #" + this.options.modalId + "in the DOM";
    },
    onAdd: function (map) {
        // add a linkage to the map, since we'll be managing map layers
        this.map = map;
        this.active = false;

        // create our button: uses FontAwesome cuz that font is... awesome
        // assign this here control as a property of the visible DIV, so we can be more terse when writing click-handlers on that visible DIV
        this.controlDiv           = L.DomUtil.create('div', 'leaflet-control-bootstrapmodal leaflet-bar');
        this.controlDiv.control   = this;
        this.controlDiv.title     = this.options.tooltip;
        this.controlDiv.innerHTML = '<a href="#"><i class="fa fa-' + this.options.glyph + '"></i></a>';
        L.DomEvent
            .addListener(this.controlDiv, 'mousedown', L.DomEvent.stopPropagation)
            .addListener(this.controlDiv, 'click', L.DomEvent.stopPropagation)
            .addListener(this.controlDiv, 'click', L.DomEvent.preventDefault)
            .addListener(this.controlDiv, 'click', function () {
                this.control.handleClick();
            });

        // done!
        return this.controlDiv;
    },

    handleClick: function () {
        this.modal.toggle();
    }
});
