app.controller("add", function($scope, appService) {
  let self = this;

  self.field = {
    name: "",
    sname: "",
    number: "",
  };

  self.check = () => {
    if(self.field.name == "" || self.field.sname == "" || self.field.number == "" || self.field.account_name == "" ) {
      return false;
    }
    return true;
  }
});



app.controller("manage", function($scope, appService) {
  let self = this;

  self.field = {
    name: ""
  };

  self.approve = (id) => {
    location.href = "index.php?module=bill&mode=confirm_bill&id=" + id;
  }

  self.rejected = (id) => {
    location.href = "index.php?module=bill&mode=rejected_bill&id=" + id;
  }

  self.remove = (name, id) => {
    self.tmp = {
      name,
      id
    };

    $("#remove").modal({ backdrop: "static" }, "show");
  };

  self.goRemove = () => {
      location.href = "index.php?module=bill&mode=remove&id=" + self.tmp.id;
  }

  self.cancelRemove = () => {
    self.tmp = {
        name :'',
        id:''
      };
}
});

app.controller("manageBank", function($scope, appService) {
  let self = this;

  self.field = {
      name: ""
  };

  self.remove = (name, id) => {
      self.tmp = {
          name,
          id
      };

      $("#remove").modal({ backdrop: "static" }, "show");
  };

  self.goRemove = () => {
      location.href = "index.php?module=bill&mode=removeBank&id=" + self.tmp.id;
  }

  self.cancelRemove = () => {
      self.tmp = {
          name: '',
          id: ''
      };
  }
});

app.controller("edit", function($scope, appService) {
  let self = this;

  self.field = {
    name: ""
  };

  
});
