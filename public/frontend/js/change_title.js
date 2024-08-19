
var intervals = [];
document.addEventListener('visibilitychange',() => {
    document.title = 'Evo Services';
    if (document.visibilityState === 'visible'){
        intervals.forEach(clearInterval);
        document.title = 'Evo Services';
    }
    if(document.visibilityState === 'hidden'){
        setInterval(function(){
            document.title = 'Nhiều khuyến mãi HOT 🔥';
        }, 5000);
        var obj2 = setInterval(function(){
            document.title = 'Evo Services';
        }, 7000);
        intervals.push(obj2);
    }
});
