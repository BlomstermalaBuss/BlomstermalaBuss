function removeWeeklyScheduleConfirmation() {
    var q = confirm('Warning! Are you sure you want to remove this/these weekly schedule(s)? Deleting this/these schedule(s) will delete ALL travels connected to this/these schedule(s). Do you want to proceed?');
    if (q) {
        return true;
    } else {
        return false;
    }
}