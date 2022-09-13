var hash = window.location.hash.substr(1);

    if (hash == "updatesetttings") {
        vt.success("Settings information updated",{
        title:"Settings Updated",
        position: "top-center",
        callback: function (){ //
        } })
    }

    if (hash == "updated") {
        vt.success("Information has been added successfully",{
        title:"Information Updated",
        position: "bottom-center",
        callback: function (){ //
        } })
    }