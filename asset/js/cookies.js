
const addToCookies = (name, id) => {
    setCookie(name, id);
}

const getCookie = (name) => {
    var c = document.cookie;
    // console.log(c);
    if (!c.includes(name) || c.includes(name+'=;')) {
        return [];
    }
    c = c.split(name+'=')[1];
    c = c.split(';')[0];
    return JSON.parse(c);
}

const setCookie = (name, val) => {
    var cur = getCookie(name);
    cur.unshift([val, new Date().toLocaleString().replace(",","").replace(/:.. /," ")]);
    document.cookie = `${name}=${JSON.stringify(cur)}; expires=Thu, 18 Dec 2024 12:00:00 UTC`;
}