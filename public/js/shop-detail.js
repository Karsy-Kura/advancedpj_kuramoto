// reserve form.
{
  // Date : set Default Value.
  {
    const formDate = document.getElementById("formDate");
    const today = dayjs().add(1, "day").format("YYYY-MM-DD");
    formDate.setAttribute("value", today);
  }

  // Time : set Option Value.
  {
    const formTime = document.getElementById("formTime");
    const minuteStep = 30;
    let countNum = 0;
    for (let h = 17; h < 24; h++) {
      for (let t = 0 ; t <= 1; t++) {
        let option = document.createElement("option");
        let time = dayjs().hour(h).minute(t * minuteStep).format("HH:mm");

        option.setAttribute("value", time);
        option.setAttribute("label", time);
        formTime.appendChild(option);
        countNum++;
        if (countNum == 1) {
          option.setAttribute("selected", true);
        }
      }
    }
  }

  // Number : set Option Value.
  {
    const formNumOfPeople = document.getElementById("formNumOfPeople");
    for (let n = 1; n <= 30; n++) {
      let option = document.createElement("option");
      option.setAttribute("value", n);
      option.setAttribute("label", n + "人");

      formNumOfPeople.appendChild(option);
      if (n == 1) {
        option.setAttribute("selected", true);
      }
    }
  }

}
