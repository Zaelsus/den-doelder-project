
    let soortBtn = document.getElementsByName('soort');
    let soortAangBtn = document.getElementsByName('soortAang');
    let soortHtKdBtn = document.getElementsByName('soortHtKd');

    let balkBtn = document.getElementsByName('balk');
    let balkAangBtn = document.getElementsByName('balkAang');
    let balkHtKdBtn = document.getElementsByName('balkHtKd');

    let soort = soortBtn[0];
    let soortAang = soortAangBtn[0];
    let soortHtKd = soortHtKdBtn[0];

    let balk = balkBtn[0];
    let balkAang = balkAangBtn[0];
    let balkHtKd = balkHtKdBtn[0];


    function disableBalk() {
    if(soort.value.length > 0 && balk.value.length < 1)
{
    balk.disabled = true;
    balkAang.disabled = true;
    balkHtKd.disabled = true;

}
    else
{
    balk.disabled = false;
    balkAang.disabled = false;
    balkHtKd.disabled = false;
}
}

    function disableSoort() {
    if(balk.value.length > 0 && soort.value.length < 1)
{
    soort.disabled = true;
    soortAang.disabled = true;
    soortHtKd.disabled = true;
}
    else
{
    soort.disabled = false;
    soortAang.disabled = false;
    soortHtKd.disabled = false;
}
}

    soort.addEventListener('click', disableBalk);
    balk.addEventListener('click', disableSoort);

