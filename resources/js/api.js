export async function getData() {
    const response = await fetch('/chartData');
    const data = await response.json();
    return data;
}