В данной задаче мы можем совершить 3 действия:
	- преобразовать 1 варнинг в 2 варнинга (1)
	- преобразовать 2 варнинга в 1 ошибку (2)
	- преобразовать 2 ошибки (3)

Описание алгоритма:
	Если нет варнингов и количество ошибок нечетное возвращаем -1. -Невозможно преобразовать нечетное количество ошибок в 0 для данных правил.
	Если же варнингов нет и количество ошибок четное(в том числе и равное 0), то количество коммитов будет равно половине количеству ошибок. Правило (3).
	При введённых ненулевых данных:
		Если количество ошибок четное, то проверяем делится ли количество варнингов на 4. Т.к. мы можем избавиться от всех ошибок только по правилу (3), следовательно, нам нужно преобразовать столько варнингов(если они есть), чтобы они давали четное число ошибок.
			Если количество варнингов не делится без остатка на 4, то нам нужно 4 - (Количество_Варнингов остаток от деления на 4) дополнительных коммитов для добавления новых варнингов по правилу (1). Теперь у нас количество варнингов делится на 4 без остатка. Делим их количество на 2(Правило (2)) и добавляем это число к уже имующимся коммитам. Далее получившееся число добавляем так же к ошибкам и делим их(Ошибки) на 2 по правилу (3). Получившееся число добавляем к коммитам.
		Иначе же, если количество ошибок нечетное, то проверяем делится ли количество ошибок на 4. Если да, то к коммитам добавляем 2, это означает применение правила (1) 2 раза, чтобы добиться четного числа варнингов неделящихся на 4, чтобы при применении правила (2) и добавления их к нечетному количеству ошибок получилось четное количество ошибок. Применяем правило (3). Прибавляем это число к коммитам, так же не забыв прибавить к ним же количество варнингов делённых на 2.
			Если же количество варнингов не делится на 4, то если количество варнингов кратно 2, тогда в переменную количества коммитов записываем число варнингов деленное на 2, иначе в переменную количество коммитов записываем (Количество_Варнингов остаток от деления на 4), что означает применение правила (1) данное число раз. Это приведет количество ошибок к четному числу неделящемуся на 4 и дающему при делении на 2(Правило (2)) нечетный результат, его прибавляем к количеству коммитов и к количеству ошибок. Данный результат будет означать появившиеся новые ошибки. Далее, число получившихся ошибок делим на 2, по правилу (3) и добавляем к количеству коммитов получившееся число.



Псевдокод(к - коммит, ф - фатальная ошибка, в - варнинг):

если В = 0, то
	если Ф делится на 2, то
		к = ф/2  => количество коммитов
	иначе,
		к = -1 => количество коммитов
иначе,
	если число ф делится на 2, то
		если в делится на 4, то
			к = в/2
			ф += в/2
			к += ф/2 => количество коммитов
		иначе,
			к = 4 - в остаток от 4х //количество коммитов для того чтобы В привести к числу делящимуся на 4
			в += к
			к += в/2
			ф += в/2
			к += ф/2 => количество коммитов
	иначе,
		если В делится на 4, то
			к = 2
			в += 2 //добавить 2 варнинга чтобы из них получить 1ф
			к += в/2
			ф += в/2
			к += ф/2 => количество коммитов
		иначе,
			если В делится на 2, то
				к = в / 2
			иначе,
				к = В остаток от 4х
				в += к
				к += в/2
			ф += в/2
			к += ф/2 => количество коммитов
