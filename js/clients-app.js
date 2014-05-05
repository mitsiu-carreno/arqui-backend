$(function() {
    $("#btn-nuevo-cliente").click(function() {
        $("#div_form_nuevo").toggle();
        $("#tbl-list").toggle();
    });
    $("#btn_nuevo_cancelar").click(function() {
        $("#div_form_nuevo").toggle();
        $("#tbl-list").toggle();
    });

    Backbone.emulateHTTP = true;
    Backbone.emulateJSON = true;

    //Un cliente
    var Cliente = Backbone.Model.extend({
        // Default attributes for the todo item.
        defaults: function() {
            return {
                nombre: "Sin nombre",
                email: "Sin email",
                password: "",
                activo : 1,
                id: null
            };
        },
        isActivo : function(){
                    return this.get("activo") == 1 ? true : false;
                },
        toggle: function() {
            console.log(this.get("activo"));
            console.log(this.isActivo());
            this.save({activo: this.isActivo() ? 0 : 1});
          }
    });

    //Lista de clientes
    var ClienteLista = Backbone.Collection.extend({
        // Reference to this collection's model.
        model: Cliente,
        url: "/index.php/clients/app"

    });

    // Create our global collection of **Clients**.
    var Clientes = new ClienteLista;

    var ClienteView = Backbone.View.extend({
        //... is a table row tag.
        tagName: "tr",
        // Cache the template function for a single item.
        template: _.template($('#item-template').html()),
        editTemplate: _.template($('#item-edit').html()),
        events: {
            "click .btn-eliminar": "clear",
            "click .btn-editar" : "loadEditForm",
            "click .btn-activar"   : "toggleActivar"
        },
        initialize: function() {
            this.listenTo(this.model, 'add', this.render);
            this.listenTo(this.model, 'change', this.render);
            this.listenTo(this.model, 'destroy', this.remove);
        },
        // Re-render the titles of the todo item.
        render: function() {
            this.$el.html(this.template(this.model.toJSON()));
//      this.$el.toggleClass('done', this.model.get('done'));
//      this.input = this.$('.edit');
            return this;
        },
        toggleActivar: function() {
            this.model.toggle();
          },
        clear: function() {
            var bb_model = this.model;
            bootbox.confirm('¿Estás seguro de <strong><span class="text-danger">eliminar</span></strong> este proyecto?', function(result){
                if(result){
                    bb_model.destroy();
                }
            });
        },
        
        loadEditForm : function(){
            var view = new ClienteEditView({model: this.model});
            $("#div_form_editar").html(view.render().el);
//            $("#form_editar_cliente").html(this.editTemplate(this.model.toJSON()));
            $("#div_form_editar").toggle();
            $("#tbl-list").toggle();
        }

    });

    var ClienteEditView = Backbone.View.extend({
        //... is a table row tag.
        tagName: "div",
        // Cache the template function for a single item.
        template: _.template($('#item-edit').html()),
        events: {
            "submit #form_editar_cliente": "updateClient",
            "click #btn_editar_cancelar" : "cancelUpdate"
        },
        initialize: function() {
            this.form = this.$("#form_editar_cliente");
        },
        // Re-render the titles of the todo item.
        render: function() {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        },
        updateClient : function(event){
            console.log("entra al submit");
            event.preventDefault();
            console.log(event.target.id +":"+JSON.stringify(this.$("#"+event.target.id).serializeObject()));
            this.model.save((this.$("#"+event.target.id).serializeObject()));
            this.$("#"+event.target.id)[0].reset();
            $("#div_form_editar").toggle();
            $("#tbl-list").toggle();
        },
        cancelUpdate : function(event){
            $("#div_form_editar").toggle();
            $("#tbl-list").toggle();
        }

    });
    
    

    var AppView = Backbone.View.extend({
        // Instead of generating a new element, bind to the existing skeleton of
        // the App already present in the HTML.
        el: $("#clientsapp"),
        events: {
            "submit #form_nuevo_cliente": "createOnSubmit"
        },
        initialize: function() {
            this.form = this.$("#form_nuevo_cliente");
            this.listenTo(Clientes, 'add', this.addOne);
            this.listenTo(Clientes, 'reset', this.addAll);
            this.listenTo(Clientes, 'all', this.render);

            Clientes.fetch();
        },
        addOne: function(Cliente) {
            var view = new ClienteView({model: Cliente});
            this.$("#tbl-list tbody").append(view.render().el);
        },
        // Add all items in the **clients** collection at once.
        addAll: function() {
            Clientes.each(this.addOne, this);
        },
        createOnSubmit: function(e) {
            e.preventDefault();
            console.log(this.form.serializeObject());
            Clientes.create(this.form.serializeObject());
            this.form[0].reset();
            $("#div_form_nuevo").toggle();
            $("#tbl-list").toggle();
        }
    });
    var App = new AppView;


});
