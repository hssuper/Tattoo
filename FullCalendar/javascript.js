
(function (win, doc) {
  "use strict";

  let calendarEl = doc.querySelector(".calendar");
  let calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: "local",
    nowIndicator: "true",
    selectable: "true",
    select: function (info) { },
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
      window.location.href = "agenda.php?id=" + info.event.id;

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

          click("botaoModal");
  

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
      url: "agenda.php",
    },
    locale: "pt-br",
  });
  calendar.render();
})(window, document);
