const sellValidation = new JustValidate("#sell");

sellValidation
    .addField("#title", [
        {
            rule: "required"
        }
    ])
    .addField("#author", [
        {
            rule: "required"
        }
    ])
    .addField("#isbn", [
        {
            rule: "required"
        }
    ])
    .addField("#price", [
        {
            rule: "required"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("sell").submit();
    });