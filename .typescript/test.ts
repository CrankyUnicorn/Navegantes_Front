export{}
console.log("Hello World!");

function Welcome(person: Person): string{
  return `Hey ${person.firstName} ${person.lastName}`;
}

interface Person {
  firstName: string,
  lastName: string;
}

const james: Person = {
  firstName: "James",
  lastName: "Doe"
}

console.log(Welcome(james));