function reverseString(str) {
    return str.split("").reverse().join("");
}

function solve(st,a,b){
    let firstPart = st.slice(0, a)
    let middlePart = st.slice(a + 1, b + 1)
    let lastPart = st.slice(b + 1, st.length)

    return firstPart + reverseString(middlePart) + lastPart
}

console.log(solve("developer",1,5));