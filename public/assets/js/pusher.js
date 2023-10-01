document.addEventListener('DOMContentLoaded', function () {
    if (!Notification) {
        alert('TrĂ¬nh duyá»‡t cá»§a báº¡n khĂ´ng há»— trá»£ chá»©c nÄƒng nĂ y.'); 
        return;
    }
    if (Notification.permission !== "granted")
        Notification.requestPermission();
});