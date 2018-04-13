select 
       dep.id,
       dep.departamento, 
       dep.icons,
       count(ind.id) as qtd_ind,
       (count(ind.id) - count(v.Realizado)) as qtd_preenchida,
       ((count(ind.id) - count(v.Realizado)) / count(ind.id)) as 'percent',
       va.Dentro, va.Fora
from 
       tb_departaments as dep
join 
       tb_indicador as ind
	   on dep.id = ind.departamentoID
left join
       (
   		select 
			vInd.id,vInd.nome,count(da.id) as Realizado
		from 
			tb_dadosmes as da
			inner join 
				tb_indicador as vInd
				on vInd.id = da.idIndicador
		where 
		  da.valor is null 	and da.mes = 2 	and da.ano = 2018
		group by vInd.id
		) as v 
		on ind.id = v.id
join (
		SELECT ca.id as idDep, ca.departamento as depName,
		sum(if(da.sentido = 0,(if(da.valor >= da.meta, 1, 0)),(if(da.valor <= da.meta, 1, 0)))) as Dentro,
		sum(if(da.sentido = 0,(if(da.valor < da.meta, 1, 0)),(if(da.valor > da.meta, 1, 0)))) as Fora
		FROM tb_dadosmes as da 
		INNER JOIN tb_indicador as ia ON da.idIndicador = ia.id
		INNER JOIN tb_departaments as ca ON ca.id = ia.departamentoID
		WHERE  da.ano = 2018 and da.mes = 2 and ca.active='Y'
		group by ca.departamento
	) as va 
	on idDep = dep.id
where ind.ano = 2018 and dep.active = 'Y'
group by 
       dep.id,
       dep.departamento
order by 
		dep.departamento