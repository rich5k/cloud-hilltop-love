var jwt = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJkZW1vdXNlciIsIm5hbWUiOiJSaWNoYXJkIEFuYXRzdWkiLCJleHAiOjI1MTYyMzkwMjIsImlzcyI6IjliYjcxM2UxLTMyNDAtNGUzYS05M2NmLTVhNGNiM2FiNTM3YyIsImVtYWlsIjoicmljaGFyZGFuYXRzdWlAZ21haWwuY29tIiwidXNlcm5hbWUiOiJyaWNoNWsifQ.UoCGCxDqbfdKlze_zzGq4tRuV8rJrmXWenw0Poia3KY';
var weavy = new Weavy({jwt : jwt});
var space = weavy.space({key:'demo'});
space.app({key:"chat-demo" ,type:"messenger", container: "#weavy-chat"});