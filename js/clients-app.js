$(function() {
    $("#btn-nuevo-cliente").click(function(){
        $("#div_form_nuevo").toggle();
        $("#tbl-list").toggle();
    });
    
    Backbone.emulateJSON = true;
    
    //Un cliente
    var Cliente = Backbone.Model.extend({
        // Default attributes for the todo item.
        defaults: function() {
            return {
                nombre: "Sin nombre",
                email: "Sin email",
                password: "",
                id: null
            };
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
        //... is a list tag.
        tagName: "tr",
        // Cache the template function for a single item.
        template: _.template($('#item-template').html()),
        initialize: function() {
            this.listenTo(this.model, 'add', this.render);
            this.listenTo(this.model, 'change', this.render);
//      this.listenTo(this.model, 'destroy', this.remove);
        },
        // Re-render the titles of the todo item.
        render: function() {
            this.$el.html(this.template(this.model.toJSON()));
//      this.$el.toggleClass('done', this.model.get('done'));
//      this.input = this.$('.edit');
            return this;
        }

    });

    var AppView = Backbone.View.extend({
        // Instead of generating a new element, bind to the existing skeleton of
        // the App already present in the HTML.
        el: $("#clientsapp"),
        events: {
            "submit #form_nuevo_cliente":  "createOnSubmit"
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
            this.form[0].reset();;
            $("#div_form_nuevo").toggle();
        $("#tbl-list").toggle();
          }
    });
    var App = new AppView;


});
