function Calendario() {
    $(function () {
      $("body").delegate("#datepicker", "focusin", function () {
        $(this).datepicker();
      });
    });
    $("#myModal").on("hide.bs.modal", function () {
      console.log("teste modal");
      /* $("#formularioConsulta").trigger("reset"); */
      $("#formularioConsulta").trigger("reset");
    });
    function getHorarios(valor) {
      var valorAjax = valor;
      /* teste = false; */
      $("#horarios").html("<option value = 0>Aguardando...</option");
  
      var boolean = false;
  
      $.ajax({
        type: "POST",
        dataType: "json",
        async: false,
        url: "horarios.php?data=" + valorAjax,
        success: function (dados) {
          var options = "";
          boolean = true;
  
          if (dados != null) {
            for (var i = 0; i < dados.length; i++) {
              options += "<option>" + dados[i].horario + "</option>";
            }
  
            options +=
              "<option value='' hidden >Sem horários disponíveis</option>";
            $("#horarios").html(options).show();
          }
          /* return teste2; */
        },
  
        error: function () {},
      });
  
      return boolean;
    }
    var data = new Date();
    (function (win, doc) {
      "use strict";
  
      let calendarEl = doc.querySelector(".calendar");
      let calendar = new FullCalendar.Calendar(calendarEl, {
        now: data,
        timeZone: "local",
        nowIndicator: "true",
        selectable: "true",
        select: function (info) {},
        eventDidMount: function (info) {
          if (info.event.extendedProps.status === "done") {
            // Change background color of row
            info.el.style.backgroundColor = "red";
  
            // Change color of dot marker
            var dotEl = info.el.getElementsByClassName("fc-event-dot")[0];
  
            if (dotEl) {
              console.log(dotEl);
              dotEl.style.backgroundColor = "white";
            } else {
              console.log("tem nao");
            }
          }
        },
  
        initialView: "dayGridMonth",
        headerToolbar: {
          start: "prev,next,today",
          center: "title",
          end: "dayGridMonth,timeGridWeek,timeGridDay,listWeek,listMonth",
        },
        eventClick: function (info) {
          window.location.href = "Consulta.php?id=" + info.event.id;
  
          // change the border color just for fun
          info.el.style.borderColor = "red";
        },
  
        dayHeaderFormat: {
          weekday: "short",
          month: "numeric",
          day: "numeric",
          omitCommas: true,
        },
        dateClick: function (info) {
          if (info.view.type == "dayGridMonth" && info.dateStr != null) {
            var a;
  
            a = getHorarios(info.dateStr);
            document.getElementById("datepicker").value = info.dateStr;
  
            if (a) {
              click("botaoModal");
            }
          }
        },
        dayMaxEventRows: true, // for all non-TimeGrid views
        views: {
          timeGrid: {
            dayMaxEventRows: 4,
          },
        },
        buttonText: {
          today: "Hoje",
          month: "Mês",
          week: "Semana",
          day: "Dia",
          listWeek: "Lista Semanal",
          listMonth: "Lista Mensal",
        },
        events: {
          url: "preencherAgenda.php",
        },
        locale: "pt-br",
      });
      calendar.render();
    })(window, document);
  }