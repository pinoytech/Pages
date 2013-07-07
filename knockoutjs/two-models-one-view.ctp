<?php $this->startIfEmpty('script');?>
<?php echo $this->Html->script('knockout-2.2.1'); ?>
<?php $this->end();?>
<div id="firstView" class="firstView offset1 span10 margin-bottom body">
  <h3>Concatenation!</h3>
  <p>First name: <input data-bind="value: firstName" /></p>
  <p>Last name: <input data-bind="value: lastName" /></p>
  <h4>Hello, <span data-bind="text: fullName"></span>!</h4>
</div>

<div id="secondView" class="offset1 span10 margin-bottom body">
  <h3>Calculation!</h3>
  <p>First value: <input data-bind="value: firstValue" /></p>
  <p>Second value: <input data-bind="value: secondValue" /></p>
  <h4>Hello, <span data-bind="text: calculatedValue"></span>!</h4>
</div>

<script>
function ViewModel() {
    this.firstName = ko.observable("John");
    this.lastName = ko.observable("Smith");
    this.fullName = ko.computed(function() {
        return this.firstName() + " " + this.lastName();
    }, this);
}

function calculatedModel() {
    this.firstValue = ko.observable(1);
    this.secondValue = ko.observable(2);
    this.calculatedValue = ko.computed(function() {
        return parseInt(this.firstValue()) + parseInt(this.secondValue());
    }, this);
}

ko.applyBindings(new ViewModel(), document.getElementById('firstView'));
ko.applyBindings(new calculatedModel(), document.getElementById('secondView'));
</script>