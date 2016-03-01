insert into Escola_danca values ('Amoreiras Plaza', 'Amoreiras', 'Lisboa');
insert into Escola_danca values ('Jazzy', 'Estrada Benfica', 'Lisboa');
insert into Escola_danca values ('Jazzy1', 'Santos', 'Lisboa');
insert into Escola_danca values ('Havana', 'Docas', 'Lisboa');


insert into Pessoa values('Ze Barbosa e Marta Miranda');
insert into Pessoa values('Avelino Chantre');
insert into Pessoa values('Petchu');
insert into Pessoa values('Oceano');
insert into Pessoa values('Bernardo');
insert into Pessoa values('Bonifacio e Karina');
insert into Pessoa values('Banderas');
insert into Pessoa values ('Ben Pedrosa');


insert into Professor values ('Ze Barbosa e Marta Miranda', 'Cabo Verde e Portugal', 'Kizomba');
insert into Professor values ('Avelino Chantre', 'Cabo Verde', 'Kizomba');
insert into Professor values ('Petchu', 'Angola', 'Kizomba, semba e tarraxinha');
insert into Professor values ('Bonifacio e Karina', 'Angola e Portugal', 'Kizomba');

insert into DJ values('Oceano');
insert into DJ values('Banderas');

insert into RP values('Bernardo', 962158785);

insert into festival values('Afrofever', 'Portugal', 'Lisboa', '120', '2016-03-01', '2016-03-03');
insert into festival values('Workshop Iberico', 'Portugal', 'Albufeira', '150', '2016-03-05', '2016-03-07');

insert into Entidade_organizadora values('Ben Pedrosa', 'Tambem professor de Kizomba');
insert into Entidade_organizadora values('Afrofever', 'Desde mil nove e picos a organizar');
insert into Entidade_organizadora values('River Party', 'festas em lisboa');
insert into Entidade_organizadora values('Havana', 'festas em lisboa+aulas');


insert into festa values('River Party', 'kings and queens', '2016-03-12 23:30:00','2016-03-13 06:00:00', 'armazem F', 'boa festa com aulas abertas', 10);
insert into festa values('Afrofever', 'sexta night', '2016-03-01 23:30:00','2016-03-02 06:00:00', 'hotel', 'boa festa com aulas abertas', 10);

insert into aula values('Amoreiras Plaza', 'Ze Barbosa e Marta Miranda', 'quinta', 'Kizomba', 30, 'intermedio');
insert into aula values('Jazzy', 'Petchu', 'segunda', 'Kizomba', 30, 'avancado');

insert into Aula_aberta values('Bonifacio e Karina', 'River Party', 'kings and queens');

insert into toca values('Banderas', 'River Party', 'kings and queens');
insert into toca values('Oceano', 'River Party', 'kings and queens');

insert into Promove values('Bernardo', 'River Party', 'kings and queens');

insert into constituido values('Ze Barbosa e Marta Miranda', 'Afrofever');
insert into constituido values('Petchu', 'Afrofever');
insert into constituido values('Ben Pedrosa', 'Afrofever');

insert into organizado values ('Afrofever', 'Afrofever');
