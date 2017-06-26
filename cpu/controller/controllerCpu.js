/**
 * Created by ENLMovil1 on 2/5/2017.
 */


$(document).ready(function(){

    $("#addram").click(function () {

        $("#ram").val($("#capacidadRam").val()+"  "+$("#frecuenciaram option:selected" ).text()+" "+$("#numModulos").val()+" modulos");

    });
    $("#addtvideo").click(function () {

        $("#tvideo").val($("#marcatv option:selected").text()+"  "+$("#modelotv").val()+"  "+$("#capacidadtv option:selected" ).text());

    });
    $("#addDisco").click(function () {
        $("#dduro").val($("#hddtotal").val()+" "+$("#cantidadhdd").val()+" "+$("#descripcionhdd").val());
    });
    $("#inventario").inputmask("99-999-9999");

    $("select").select2();

    $('input[name="garantia"]').daterangepicker({
        autoUpdateInput: false,
        timepicker:false,
        opens: "center",
        cancelClass: "btn-danger",
        locale:{
            format:'YYYY/MM/DD',
            cancelLabel: 'Borrar'
        }
    });
    //esto es para que garantia inicie vacio
    $('input[name="garantia"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
    });
    //esto es para limpiar el campo de garntia
    $('input[name="garantia"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $('input[name="fingreso"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
//permitir solo valores numericos en el campo de num inventario
    $("#inventario").focusout(function() {
        this.value = (this.value + '').replace(/[^0-9]/g, '');
        verificaId($(this).val());

        var maxChars = 11;
        if ($(this).val().length > maxChars) {

            toastr.error("Error","error al ingresar numero de inventario");
            $("#div_inventario").addClass("has-error");
            $("#error").removeClass("hidden");

        }
        if($(this).val().length == maxChars){
            $("#div_inventario").removeClass("has-error");
            $("#div_inventario").addClass("has-success");
            $("#error").addClass("hidden");

        }
    });
});
//para abrir los modales para agregar
$("#mmarca").click(function () {
    var modal = new Custombox.modal({
        content: {

            target: '#demo-marca',
            effect: 'fall',

        }
    });

    modal.open();
});

$("#mlicencia").click(function () {
    var modal = new Custombox.modal({
        content: {

            target: '#demo-licencia',
            effect: 'fall',
            positionX: 'center',
            positionY: 'center',
            fullscreen: true,
        }
    });

    modal.open();
});
$("#mresponsable").click(function () {
    var modal = new Custombox.modal({
        content: {
            target: '#demo-responsables',
            effect: 'fall',
            positionX: 'center',
            positionY: 'center',
        }
    });

    modal.open();
});
$("#mip").click(function () {
    var modal = new Custombox.modal({
        content: {
            target: '#demo-ip',
            effect: 'fall',
            positionX: 'center',
            positionY: 'center',
        }
    });

    modal.open();
});

$("#mdisco").click(function () {
    var modal = new Custombox.modal({
        content: {
            target: '#demo-disco',
            effect: 'fall',
            positionX: 'center',
            positionY: 'center',
        }
    });

    modal.open();
});

$("#newRam").click(function () {
    var modal = new Custombox.modal({
        content: {
            target: '#demo-ram',
            effect: 'fall',
            positionX: 'center',
            positionY: 'center',
        }
    });

    modal.open();
});

$("#newTv").click(function () {
    var modal = new Custombox.modal({
        content: {
            target: '#demo-tvideo',
            effect: 'fall',
            positionX: 'center',
            positionY: 'center',
        }
    });

    modal.open();
});
//aqui terminar los open modal

//actualizar combos
function uresponsable() {
    $("#empleados").load("consultas_cpu.php?combo=responsable");
}
function udisco() {
    $("#discoD").load("consultas_cpu.php?combo=disco");
}
function umarca() {
    $("#marca").load("consultas_cpu.php?combo=marca");
}
function ulicencias() {
    $("#licencia").load("consultas_cpu.php?combo=licencia");
}
function uip() {
    $("#ip").load("consultas_cpu.php?combo=ip");
}



$("#guardar").click(function()
{
    var num_inventario = $("#inventario").val();
    var procesador = $("#procesador").val();
    var modelo = $("#modelo").val();
    var marca = $("#marca").val();
    var servT= $("#servT").val();
    var nombre_cpu = $("#nombre_cpu").val();
   // var ram = $("#ramReal").val();
   // var tvideo = $("#tvideoReal").val();
    var estado = $("#estado").val();
    var obs = $("#observaciones").val();
    var garantia = $("#garantia").val();
    var empleados = $("#empleados").val();
    var licencia = $("#licencia").val();
    var clasificacion = $("#clasificacion").val();
    var usu_cpu = $("#usu_cpu").val();
    var ip = $("#ip").val();
    var ubicacion = $("#ubicacion").val();

    //Campos de RAM
    var capacidadRam = $("#capacidadRam").val();
    var tipoRam = $("#tipoRam").val();
    var num_modelosRam = $("#numModulos").val();
    var frecuenciaRam = $("#frecuenciaram").val();

    //campos de TVideo
    var marcatv= $("#marcatv").val();
    var modelotv= $("#modelotv").val();
    var capacidadtv= $("#capacidadtv").val();
    //campos de hdd
    var hddtotal=$("#hddtotal").val();
    var capacidadhdd=$("#cantidadhdd").val();
    var descripcionhdd=$("#descripcionhdd").val();

    if ($('#empleados').val()==''){ toastr.warning("Debe asignar un Responsable intente de Nuevo"); return;}

    //validaciones
    if(num_inventario.trim()=='') {toastr.error("Hay campos que son obligatorios"); return; }
    if(num_inventario.indexOf('_') != -1) {toastr.error("Numero de Inventario no valido"); return; }

    if(num_inventario.length!=11){  toastr.error('Error',' inventario solo son 11 valores'); return; }
    if (!/^([0-9])*$/.test(marcatv) || marcatv.trim()==''){ toastr.error("La marca de tarjeta de video es invalida"); return;}
    if (!/^([0-9])*$/.test(marca) || marca.trim()==''){ toastr.error("La marca del equipo es invalida"); return;}
    if (!/^([0-9])*$/.test(ubicacion) || ubicacion.trim()==''){ toastr.error("La ubicacion del equipo es invalida"); return;}
   // verificaId(num_inventario);

    $.ajax({
        type:"POST",
        url:"consultas_cpu.php",
        data:
            {
                tarea:"guardar",
                num_inventario:num_inventario,
                procesador:procesador,
                modelo:modelo,
                marca:marca,
                servT:servT,
                nombre_cpu: nombre_cpu,
                estado:estado,
                ubicacion:ubicacion,
                obs:obs,
                ip:ip,
                garantia:garantia,
                empleados:empleados,
                licencia:licencia,
                clasificacion:clasificacion,
                usu_cpu:usu_cpu,
                capacidadRam:capacidadRam,
                tipoRam:tipoRam,
                numModulos:num_modelosRam,
                frecuenciaRam:frecuenciaRam,
                marcatv:marcatv,
                modelotv:modelotv,
                capacidadtv:capacidadtv,
                hddtotal:hddtotal,
                cantidadhdd:capacidadhdd,
                descripcionhdd:descripcionhdd
            },
        success: function(data)
        {
            data=data.split("|");

            $.each(data, function(i, item) {

                if (item=="bien"){
                    toastr.success('Exito','se ha Guardado correctamnete');
                    limpiarcampos();
                    goBackSucces();
                }
                if (item=="mal"){
                    toastr.error('Error','Ha ocurrido un Error');
                }

            });
        },
        error: function(xhr, ajaxOptions, thrownError)
        {
            alert(thrownError);
            toast.error("No funciona ajax para guardar");
        }
    })

});
function verificaId(id) {
    $.ajax(
        {
            type: "POST",
            url: "consultas_cpu.php",
            data: {
                tarea: 'verifica',
                id: id

            },
            success: function (data){
                if(data=="existe"){
                    toastr.error("ERROR", "Este numero de inventario ya existe");

                    $("#div_inventario").removeClass("has-success");
                    $("#div_inventario").addClass("has-error");
                    return;
                }if(data.length==11){
                    $("#div_inventario").removeClass("has-error");
                    $("#div_inventario").addClass("has-success");
                    $("#error").addClass("hidden");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
}
function limpiarcampos(){ document.getElementById("inventario").value=""; }
function goBack(){ setTimeout(function(){  window.location.href="ver-ot.php";  }, 30); }
function goBackSucces(){ setTimeout(function(){  window.location.href="ver-ot.php";  }, 300); }
